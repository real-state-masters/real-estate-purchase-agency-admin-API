<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{

    public function index(){

        $factory = (new Factory)->withServiceAccount(__DIR__.'/FireBaseKey.json');

        $database = $factory->createDatabase();

        $ref = $database->getReference('prueba1');

        var_dump($ref);
        //$key = $ref->push()->getKey();

        //return $key;
    }



}
