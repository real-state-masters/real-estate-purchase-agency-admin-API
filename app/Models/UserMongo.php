<?php

namespace App\Models;

use App\Models\MongoModel;

class UserMongo extends MongoModel
{
    public static $collection = 'users'; 
}
