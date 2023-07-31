<?php

namespace App\Controllers;

use App\Models\Users;

class __MongoTestController extends BaseController
{
    
    public function findTest()
    {
        $data = Users::model()->find([
            'passwd' => 'sandyblaze'
        ]);
        echo "<pre>" . print_r($data, true) . "</pre>";   
    }
    
    public function findOneTest()
    {
        $data = Users::model()->findOne([
            'user_id' => 'sandy-3'
        ]);
        echo "<pre>" . print_r($data, true) . "</pre>";   
    }

    public function insertOneTest()
    {
        $user = new Users();
        $user->user_id = 'sandy-5';
        $user->email = 'sandyblaze985@gmail.com';
        $user->name = 'sandyblaze-5';
        $user->passwd = 'sandyblaze';
        $data = $user->save();
        echo "<pre>" . print_r($data, true) . "</pre>";   
    }

    public function updateOneTest()
    {
        $data = Users::model()->UpdateOne(['user_id' => 'sandy-4'],
        [
            '$set' => [
                'name' => 'sandyblaze-3'
            ],
        ]);
        echo "<pre>" . print_r($data, true) . "</pre>";
    }

    public function deleteOneTest()
    {
        $data = Users::model()->deleteOne(['user_id' => 'sandy-5']);
        echo "<pre>" . print_r($data, true) . "</pre>";   

        $user = new Users();
        $user->user_id = 'sandy-5';
        $user->email = 'sandyblaze985@gmail.com';
        $user->name = 'sandyblaze-5';
        $user->passwd = 'sandyblaze';
        $data = $user->save();
    }

    public function testAggregation()
    {
        $data = Users::model()->startAggregation()
            ->addStage([
                '$group' => [
                    '_id' => '$name', 
                    'count' => [
                        '$sum' => 1,
                    ]
                ]
            ])
            ->sort([
                'count' => -1
            ])
            ->limit(2)
            ->aggregate();
        echo "<pre>" . print_r($data, true) . "</pre>";
    }
}
