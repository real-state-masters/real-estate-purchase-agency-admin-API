<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Client as Mongo;

class MongoModel
{
    const DATABASE = 'acme';
    public static $collection;
    public static $instance;
    public $db;
    use HasFactory;


    public function __construct($collection)
    {
        $this->db = (new Mongo)->{self::DATABASE};
        static::$instance = $this->db->{$collection};
    }

    public static function getInstance()
    {
        if(!static::$instance){
            new MongoModel(static::$collection);
        }
        return static::$instance;
    }
    public static function find()
    {
        self::getInstance();
        return static::$instance->find();
    }
    public static function insert($data)
    {
        return self::getInstance()->insertMany($data);
    }

    public static function update($data)
    {
        return self::getInstance()->updateMany($data);
    }

    public static function delete($filter)
    {
        return self::getInstance()->deleteMany($filter);
    }

}
