<?php

namespace App\Models;

use App\Components\MongoDocument;

class Users extends MongoDocument {
    public $user_id;
    public $email;
    public $name;
    public $passwd;

    private static $model; 
    public static function model() 
    {
        if (!isset(self::$model)) {
            self::$model = new static();
        }
        return self::$model;
    }
    
    function __construct() 
    {
        Parent::__construct();
    }

    function getCollectionName() 
    {
        return "users";
    }

    public function rules() {
        return [
            ['user_id, email, name, passwd', 'required'],
            ['email', 'validateEmail'],
        ];
    }

    public function validateEmail($name) {
        $email = $this->$name;
        $pattern = "/^[a-z0-9](\.?[a-z0-9]){5,}@gmail.com/";
        return preg_match($pattern, $email);
    }

    public function indexes()
    {
        return [
            'user_id_1' => [
                'key' => [
                    'user_id' => self::SORT_ASC
                ],
                'unique' => true,
            ],
            'email_1' => [
                'key' => [
                    'email' => self::SORT_ASC
                ],
                'unique' => true,
            ],
            'name_1' => [
                'key' => [
                    'name' => self::SORT_ASC
                ],
            ],
        ];
    }

}
