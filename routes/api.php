<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PropertyController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\FirebaseUserController;
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
Route::resource('/properties',PropertyController::class)->middleware("firebase");
Route::get('/properties/location/{city}',[PropertyController::class,'searchLocation'])->middleware("firebase");
Route::get('/properties/get/last',[PropertyController::class,'lastProperties'])->middleware("firebase");
Route::post('/properties/buy',[PropertyController::class,'changeStatus'])->middleware("firebase");


Route::resource('/users',UserController::class)->middleware("firebase");
// Route::resource('/properties',PropertyController::class);


// Route::resource('/users',UserController::class);
// Route::post('/test',[PropertyController::class,'store']);
//Route::get('/mongo', [PropertyController::class, 'mongoConnect']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::fallback(function () {
    return 'RESOURcE DOES NOT EXIST';
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::any('{catchall}', function(){
//     return 'not founddd';
// })->where('catchall', '.*');