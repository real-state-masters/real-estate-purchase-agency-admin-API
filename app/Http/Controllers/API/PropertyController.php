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
        
        Property::insert([
            [
                'location'=> $request->location,
                'type'=>$request->type,
                'area'=>$request->area,
                'price'=>$request->price,
                'description'=>$request->description,
                'contact_id'=>$request->contact,
                'title'=>$request->title,
                'bathrooms' =>$request->bathrooms ,
                'rooms' =>$request->rooms,
                'pets' =>$request->pets,
                'condition' =>$request->condition,
            ]
        ]);
        

        return parent::sendResponse('hessssllo');
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
    public function update(UpdateProperty $request, $id)
    {
        //
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
