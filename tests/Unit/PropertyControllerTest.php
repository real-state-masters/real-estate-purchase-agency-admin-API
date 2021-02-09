<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\API\PropertyController;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Requests\API\StoreProperty;
use stdClass;

class PropertyControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_Index()
    {
        $index = new PropertyController;
        $this->assertGreaterThan(0, count($index->index()));
    }

    public function test_storeTest(){

        $index = new PropertyController;
        $request = new stdClass;
        $currentDateTime = date('Y-m-d H:i:s');

        $request = StoreProperty::create('/store', 'POST',[
            'location' => $request->location,
            'type' => $request->type,
            'type_house' => $request->type_house,
            'area' => $request->area, //m2
            'status' => $request->status, // sold
            'bought_by' => $request->bought_by,
            'created_at' => $currentDateTime,
            'updated_at' => $request->updated_at,
            'price' => $request->price,
            'images' => $request->images,
            'description' => $request->description,
            'num_bathrooms' => $request->num_bathrooms,
            'num_rooms' => $request->num_rooms,
            'pets' => $request->pets,
            'condition' => $request->condition,
            'contact' => $request->contact, //id of the user in charge of the property
            'title' => $request->title,
            'building_use' => $request->building_use,
            'air_condition' => $request->air_condition, // type: bool
            'terrace' => $request->terrace,
            'equipment' => $request->equipment, //  type: int 0-> Indifferent , 1-> fully fitted kitchen, 2-> furnished  
            'garden' => $request->garden, // type:bool
            'swimming_pool' => $request->swiming_pool, // type: bool
            'lift' => $request->lift,
            'type_house' => $request->type_house
        ]);

        //$reponse = $index->store($request);
        $request->assertStatus(400);
    }

}
