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
    public function store(Request $request)
    {
        //

        Property::insert([
            [
                'location'=> $request->location,
                'type'=>$request->type,
                'area'=>$request->area, //m2
                'status' => $request->status, // sold
                'sold_at' => $request->sold_at,
                'bought_by' => $request->bought_by,
                'created_at' => $request->created_at,
                'updated_at' => $request->updated_at,
                'price'=>$request->price,
                'images' => $request->images,
                'description'=>$request->description,
                'num_bathrooms' =>$request->num_bathrooms,
                'num_rooms' => $request->num_rooms,
                'pets' =>$request->pets,
                'fully_fitted_kitchen' => $request->fully_fitted_kitchen,
                'furnished' => $request->furnished,
                'condition' =>$request->condition,
                'contact'=>$request->contact, //id of the user in charge of the property
                'title'=>$request->title,
            ]
        ]);

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Property::update(["location" => "60182f6bba1a0000ca007419"],
        ['$set'=>[
                'type'=> "holaaaaaaaaaaa"
                /*'type'=>$request->type,
                'area'=>$request->area, //m2
                'status' => $request->status, // sold
                'sold_at' => $request->sold_at,
                'bought_by' => $request->bought_by,
                'created_at' => $request->created_at,
                'updated_at' => $request->updated_at,
                'price'=>$request->price,
                'images' => $request->images,
                'description'=>$request->description,
                'num_bathrooms' =>$request->num_bathrooms,
                'num_rooms' => $request->num_rooms,
                'pets' =>$request->pets,
                'fully_fitted_kitchen' => $request->fully_fitted_kitchen,
                'furnished' => $request->furnished,
                'condition' =>$request->condition,
                'contact'=>$request->contact, //id of the user in charge of the property
                'title'=>$request->title,*/
            ]
        ]);
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
        //
    }
}
