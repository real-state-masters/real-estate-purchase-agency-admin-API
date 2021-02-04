<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserMongo as User;
use App\Http\Requests\API\StoreUser;
use App\Http\Requests\API\UpdateUser;
//use Mongo\BJSON\ObjectId;
use stdClass;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::find()->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $userData = $request->validated();

        if(User::find(['email' => $userData['email']])->toArray()){
            return Controller::sendError([],'User exist');
        }

        $userData['password'] = Hash::make($request->password);
        $result = User::insert($userData);
        if($result->getInsertedCount()===0){
            return Controller::sendError([],'User could not be registered');
        }
        $userData['_id'] = $result->getInsertedId();
        return Controller::sendResponse($userData,'User successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user = User::find(['_id'=>$id ]);
        $user = User::findOne($id);
        if(!$user){
            return Controller::sendError(['_id'=>'Id not found'],'User not found');
        }
        return Controller::sendResponse($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
        $userData = $request->validated();
        if(!User::findOne($id)){
            return Controller::sendError(['id'=>'Id not found'],'Resource could not be updated');
        }
        User::update(['_id'=>$id],['$set'=>$userData]);
        $user = User::findOne($id);
        return Controller::sendResponse($user,'User successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $deleted = User::deleteOne($id);
        if($deleted->getDeletedCount() === 0){
            return Controller::sendError([],'User could not be deleted');
        }
        return Controller::sendResponse($id,'User deleted successfully');
    }
}
