<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\StoreProperty;
use App\Http\Requests\API\UpdateProperty;
use App\Models\Property;
use MongoDB\Client as Mongo;
use App\Http\Requests\test;
use MongoDB\BSON\Regex;


class PropertyController extends Controller
{
    public function __construct()
    {
        //$this->properties = Property::getCollection();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = new Mongo;
        //$conn = $data->{'acme'}->properties;
        //return $conn->find()->toArray();
        //return $this->properties->find()->toArray();
        return Property::find()->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProperty $request)
    {

        $currentDateTime = date('Y-m-d H:i:s');

        Property::insertOne(
            [
                'location' => $request->location,
                'type' => $request->type,
                'type_house' => $request->type_house,
                'area' => $request->area, //m2
                'status' => $request->status, // sold
                'bought_by' => $request->bought_by,
                'created_at' => $currentDateTime,
                'price' => $request->price,
                'images' => $request->images,
                'description' => $request->description,
                'num_bathrooms' => $request->num_bathrooms,
                'num_rooms' => $request->num_rooms,
                'pets' => $request->pets,
                'equipment' => $request->equipment, //  type: int 0-> Indifferent , 1-> fully fitted kitchen, 2-> furnished  
                'garden' => $request->garden, // type:bool
                'swimming_pool' => $request->swimming_pool, // type: bool
                'lift' => $request->lift,
                'condition' => $request->condition,
                'air_condition' => $request->air_condition, // type: bool
                'terrace' => $request->terrace,
                'contact' => $request->contact, //id of the user in charge of the property
                'title' => $request->title,
                'building_use' => $request->building_use,
            ]
        );

        return parent::sendResponse('stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $property = Property::findOne($id);
        if(!$property){
            return Controller::sendError('Property not found');
        }
        return Controller::sendResponse($property);
    }

    /**
     * Display the specified resource filtering by city name.
     *
     * @param  int  $location
     * @return \Illuminate\Http\Response
     */

    public function searchLocation($location)
    {
        $property = Property::find(['location.address'=> new Regex($location,'i')])->toArray();

        if(!$property){
            return Controller::sendError(['location'=>'Location not found'],'Property not found');
        }
        return Controller::sendResponse($property);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProperty $request, $id)
    {
        $propertyTypes = [0,1,2];

        if(!in_array($request->type,$propertyTypes)){
            return Controller::sendError(['type'=>'Incorrect type'],'Property type is not correct.');
        } 
        $currentDateTime = date('Y-m-d H:i:s');

        Property::updateOne(
            ["_id" => $id],
            [
                '$set' => [
                    'location' => $request->location,
                    'type' => $request->type,
                    'type_house' => $request->type_house,
                    'area' => $request->area, //m2
                    'status' => $request->status, // sold
                    'bought_by' => $request->bought_by,
                    'updated_at' => $currentDateTime,
                    'price' => $request->price,
                    'images' => $request->images,
                    'description' => $request->description,
                    'num_bathrooms' => $request->num_bathrooms,
                    'num_rooms' => $request->num_rooms,
                    'pets' => $request->pets,
                    'equipment' => $request->equipment, //  type: int 0-> Indifferent , 1-> fully fitted kitchen, 2-> furnished 
                    'garden' => $request->garden, // type:bool
                    'swimming_pool' => $request->swimming_pool, // type: bool
                    'lift' => $request->lift,
                    'condition' => $request->condition,
                    'air_condition' => $request->air_condition, // type: bool
                    'terrace' => $request->terrace,
                    'contact' => $request->contact, //id of the user in charge of the property
                    'title' => $request->title,
                    'building_use' => $request->building_use,
                ]
            ]
        );
        return parent::sendResponse('updated');
    }

    /**
     * Update the status of the properties.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function changeStatus(Request $request)
    {

        $property = Property::findOne($request->id);
        
        if(!$property){
            
            return Controller::sendError('Property not found');
        }

        Property::update(['_id'=>$request->id],['$set'=>['status'=>false]]);
        return Controller::sendResponse($property);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Property::deleteOne($id);
        var_dump($deleted);
        if($deleted->getDeletedCount() === 0){
            return Controller::sendError([],'Property could not be deleted');
        }
        return Controller::sendResponse($id,'Property deleted successfully');
    }
}