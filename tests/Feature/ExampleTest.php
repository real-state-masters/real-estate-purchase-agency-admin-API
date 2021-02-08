<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get()
    {
        $response = $this->get('/api/properties/?jwt=' . env('CLIENT_TOKEN'));

        $response->assertStatus(200);
    }




    public function test_structure()
    {
        $response = $this->get('/api/properties?jwt='.env('CLIENT_TOKEN'));

        $a = sizeOf($response->getData());

        for ($i = 0; $i < $a; $i++) {
            $response->assertJsonStructure(
                [
                    $i => [
                        '_id',
                        'location' => [
                            'id',
                            'coordinates',
                            'address',
                            'context',
                            'property_id',
                        ],
                        'type', // type: enum  (home/office)
                        'type_house', // type: int, -1-> not a house,  0 -> duplex, 1->house, 2->penthouse
                        'area', // type int ( m^²)
                        'status', // type: boolean .  true -> not sold, false-> sold
                        'bought_by', // type: int ( user_id).  if -1-> not bought by anyone
                        'created_at',
                        'updated_at',
                        'price', // type: int
                        'images', // array of url's  // type: array
                        'description', // type:string
                        'num_bathrooms', // type: int
                        'num_rooms', // type: int
                        'pets', // type: bool
                        'equipment', //  type: int 0-> Indifferent , 1-> fully fitted kitchen, 2-> furnished
                        'garden', // type:bool
                        'swimming_pool', // type: bool
                        'lift', // type: bool
                        'condition', // type: int , 0-> new homes, 1-> good condition , 2-> needs renovation
                        'air_condition', // type: bool
                        'terrace', // type: bool
                        'contact', // admin email
                        'title', // type: string
                        'building_use'  // type:integer, -1-> not an office,  0-> private, 1->co_working , 2-> security_system
                    ]
                ]
            );
        }
    }
}
