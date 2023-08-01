<?php

namespace App\Components;

use ReflectionClass;
use ReflectionProperty;
use App\Libraries\MongoConnection;

abstract class MongoDocument
{

    const SORT_ASC = 1;
    const SORT_DEC = -1;

    protected $collection;

    private static $_models = [];

    function __construct()
    {
        $this->connectCollection();
        $this->setIndices();
    }

    public static function model($className = __CLASS__)
    {
        if (!isset(self::$_models[$className])) {
            self::$_models[$className] = new $className();
        }
        return self::$_models[$className];
    }

    private function connectCollection()
    {
        $connection = new MongoConnection();
        $database = $connection->getDatabase();
        $collectionName = $this->getCollectionName();
        $this->collection = $database->$collectionName;
    }

    abstract function getCollectionName();

    public function find($filter = [], $criteria = [])
    {
        $cursor = $this->collection->find($filter, $criteria);
        $data = $cursor->toArray();
        return $data;
    }

    public function findOne($filter = [], $criteria = [])
    {
        $data = $this->collection->findOne($filter, $criteria);
        return $data;
    }

    public function insertOne($postData)
    {
        $data = $this->collection->insertOne($postData);
        $postData['_id'] = $data->getInsertedId();
        return $postData;
    }

    public function updateOne($filter = [], $updateData = [], $options = [])
    {
        $options = [
            // 'returnDocument' => MongoDB\Operation\FindOneAndUpdate::RETURN_DOCUMENT_AFTER,
            ...$options,
        ];
        $updatedDocument = $this->collection->findOneAndUpdate($filter, $updateData);
        return $updatedDocument;
    }

    public function deleteOne($filter = [])
    {
        $result = $this->collection->deleteOne($filter);
        return $result;
    }

    public function rules()
    {
        return [];
    }

    /**
     * Custom methods for computing mongodb Aggregations
     */
    private $_pipeline = null;
    public function startAggregation()
    {
        $this->_pipeline = [];
        return $this;
    }

    public function addStage(array $stage)
    {
        $this->_pipeline[] = $stage;
        return $this;
    }

    public function limit($limit)
    {
        $this->_pipeline[] = ['$limit' => $limit];
        return $this;
    }

    public function skip($skip)
    {
        $this->_pipeline[] = ['$skip' => $skip];
        return $this;
    }

    public function count()
    {
        $this->_pipeline[] = ['$count' => "count"];
        return $this;
    }

    public function sort(array $stage)
    {
        $this->_pipeline[] = ['$sort' => $stage];
        return $this;
    }

    public function project(array $stage)
    {
        $this->_pipeline[] = ['$project' => $stage];
        return $this;
    }

    public function group(array $stage)
    {
        $this->_pipeline[] = ['$group' => $stage];
        return $this;
    }

    public function match(array $stage)
    {
        $this->_pipeline[] = ['$match' => $stage];
        return $this;
    }

    public function aggregate($pipeline = [])
    {
        $pipeline = $pipeline ? $pipeline : $this->_pipeline;
        $cursor = $this->collection->aggregate(
            $pipeline,
            [
                'allowDiskUse' => true,
                'cursor' => [
                    'batchSize' => 1000
                ]
            ]
        );
        $result = $cursor->toArray();
        $this->_pipeline = null;
        return $result;
    }

    /**
     * Validating the rules `rules` method on the modal
     *  by default methods in mongodb
     *  and as well as custom methods
     */
    public function validate()
    {
        $rules = $this->rules();
        foreach ($rules as $rule) {
            $props = explode(",", $rule[0]);
            $type = $rule[1];
            if ($type == 'required') {
                foreach ($props as $prop) {
                    $prop = trim($prop);
                    if (!isset($this->$prop)) {
                        return false;
                    }
                }
            } else {
                foreach ($props as $prop) {
                    $prop = trim($prop);
                    if (!$this->$type($prop)) {
                        return false;
                    }
                }
            }
        }
        return true;
    }

    /**
     * To save the data in the database by validating it
     */
    public function save($flag = true)
    {
        if ($flag) {
            if (!$this->validate()) {
                return false;
            }
        }
        $reflect = new ReflectionClass($this);
        $props = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
        $props = array_filter($props, function ($prop) {
            return !$prop->isStatic();
        });
        $data = [];
        foreach ($props as $prop) {
            $data[$prop->name] = $this->{$prop->name};
        }
        return $this->insertOne($data);
    }

    /**
     * To create the indices in the database for the collection provided in the child class
     * overwrite the indexes methods in the child class
     */
    private function setIndices()
    {
        $indexes = $this->indexes();
        if (count($indexes) == 0) {
            return;
        }
        foreach ($indexes as $name => $value) {
            $key = $value['key'];
            unset($value['key']);
            $this->collection->createIndex($key, ['name' => $name, ...$value]);
        }
    }

    public function indexes()
    {
        return [];
    }
}
