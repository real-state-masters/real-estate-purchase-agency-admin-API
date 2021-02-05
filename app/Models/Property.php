<?php

namespace App\Models;

use App\Models\MongoModel;

class Property extends MongoModel
{
    public static $collection = 'properties';
    
    public static $propertyTypes = ['duplex','house','penthouse'];
    

}
