<?php

namespace App\Models;

use App\Components\MongoDocument;

class News extends MongoDocument
{
    public $news_id;
    public $date;
    public $article;

    function __construct()
    {
        Parent::__construct();
    }

    public static function model($classname = __CLASS__)
    {
        return parent::model($classname);
    }

    function getCollectionName()
    {
        return "news";
    }

    public function rules()
    {
        return [
            ['news_id, date, article', 'required'],
        ];
    }

    public function indexes()
    {
        return [
            'news_id_1' => [
                'key' => [
                    'news_id' => self::SORT_ASC
                ],
                'unique' => true,
            ],
            'date_1' => [
                'key' => [
                    'date' => self::SORT_ASC
                ],
            ],
        ];
    }
}
