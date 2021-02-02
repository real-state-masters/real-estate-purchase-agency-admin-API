<?php

use App\Http\Controllers\API\PropertyController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// The catch-all will match anything except the previous defined routes.

Route::resource('/properties',PropertyController::class);
Route::resource('/users',UserController::class);
Route::post('/test',[PropertyController::class,'store']);
Route::get('/mongo', [PropertyController::class, 'mongoConnect']);

Route::fallback(function () {
    return 'RESOURcE DOES NOT EXIST';
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('{catchall}', function(){
    return 'catched';
})->where('catchall', '.*');