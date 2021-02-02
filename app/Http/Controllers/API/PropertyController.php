<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\StoreProperty;
use App\Http\Requests\API\UpdateProperty;
use App\Models\Property;
use MongoDB\Client as Mongo;
use App\Http\Requests\test;


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
        //

        Property::insertOne(
            [
                'location' => $request->location,
                'type' => $request->type,
                'area' => $request->area, //m2
                'status' => $request->status, // sold
                'sold_at' => $request->sold_at,
                'bought_by' => $request->bought_by,
                'created_at' => $request->created_at,
                'updated_at' => $request->updated_at,
                'price' => $request->price,
                'images' => $request->images,
                'description' => $request->description,
                'num_bathrooms' => $request->num_bathrooms,
                'num_rooms' => $request->num_rooms,
                'pets' => $request->pets,
                'fully_fitted_kitchen' => $request->fully_fitted_kitchen,
                'furnished' => $request->furnished,
                'condition' => $request->condition,
                'contact' => $request->contact, //id of the user in charge of the property
                'title' => $request->title,
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
            return Controller::sendError(['_id'=>'Id not found'],'Property not found');
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
        Property::updateOne(
            ["_id" => $id],
            [
                '$set' => [
                    'location' => [
                        'id' => "124234fas234d",
                        'coordinates' => [234234.23, 141234.23], //useful for map
                        'address' => 'my street 23',
                        'context' => ['pais' => 'españa', 'comercios' => 'tiendas'], //reference to country,region, place
                        'property_id' => 3,
                    ],
                    'type' => $request->type,
                    'area' => $request->area, //m2
                    'status' => $request->status, // sold
                    'sold_at' => $request->sold_at,
                    'bought_by' => $request->bought_by,
                    'created_at' => $request->created_at,
                    'updated_at' => $request->updated_at,
                    'price' => $request->price,
                    'images' => $request->images,
                    'description' => $request->description,
                    'num_bathrooms' => $request->num_bathrooms,
                    'num_rooms' => $request->num_rooms,
                    'pets' => $request->pets,
                    'fully_fitted_kitchen' => $request->fully_fitted_kitchen,
                    'furnished' => $request->furnished,
                    'condition' => $request->condition,
                    'contact' => $request->contact, //id of the user in charge of the property
                    'title' => $request->title,
                ]
            ]
        );
        return parent::sendResponse('updated');
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