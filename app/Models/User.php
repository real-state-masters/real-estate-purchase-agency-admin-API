<?php

namespace App\Models;

use App\Models\MongoModel;

class User extends MongoModel
{
    public static $collection = 'users';
}
