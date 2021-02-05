<?php

namespace App\Http\Controllers;

use App\Models\FirebaseUser;
use Illuminate\Http\Request;

class FirebaseUserController extends Controller
{
    //

    public function index()
    {
        $categories = FirebaseUser::all();

        return response([ 'categories' => $categories, 'message' => 'Retrieved successfully'], 200);
    }
}
