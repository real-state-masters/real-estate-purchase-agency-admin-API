<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Client as Mongo;

class MongoModel
{
    const DATABASE = 'nuevaDDBB';
    public static $collection;
    public static $instance;
    public $db;
    use HasFactory;


    public function __construct($collection)
    {
        $this->db = (new Mongo('mongodb+srv://ariel:'.env('MONGODB_PASSWORD').'@cluster0.zkwdz.mongodb.net/'.self::DATABASE.'?retryWrites=true&w=majority'))->{self::DATABASE};
        static::$instance = $this->db->{$collection};
    }

    public static function getInstance()
    {
        if(!static::$instance){
            new MongoModel(static::$collection);
        }
        return static::$instance;
    }
    public static function find($filter = [])
    {
        self::getInstance();
        return static::$instance->find($filter);
    }

    /**
     * Insert a new document in the collection and creates a numeric id rather than the ObjectId 
     * that mongo introduces by default
     * @param array $data keys values that will be inserted in the model's collection
     */
    public static function insert($data)
    {
            $id = uniqid(time());
            while(count(self::getInstance()->find(['_id'=>$id])->toArray())!==0){
                $id = uniqid(time());
            }
            return self::getInstance()->insertOne($data+['_id'=>$id]);
    }

    public static function update($filter,$data)
    {
        return self::getInstance()->updateMany($filter,$data);
    }

    public static function delete($filter)
    {
        return self::getInstance()->deleteMany($filter);
    }


    public static function findOne($id)
    {
        return self::getInstance()->findOne(['_id'=>$id]);
    }


    public static function insertOne($data)
    {
        $id = uniqid(time());
        while(count(self::getInstance()->find(['_id'=>$id])->toArray())!==0){
            $id = uniqid(time());
        }
        return self::getInstance()->insertOne($data+['_id'=>$id]);
    }


    public static function updateOne($filter,$data)
    {
        return self::getInstance()->updateOne($filter,$data);
    }


    public static function deleteOne($id)
    {
        return self::getInstance()->deleteOne(['_id'=>$id]);
    }
}
