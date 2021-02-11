<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_get()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . env('CLIENT_TOKEN'),
        ])->get('/api/properties');
        $response->assertStatus(200);
    }

    public function test_post()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . env('CLIENT_TOKEN'),
        ])->post('/api/properties', [
            'location' => ['test'],
            'type' => 'test',
            'type_house' => 0,
            'area' => 0, //m2
            'status' => true, // sold
            'bought_by' => 0,
            'price' => 0,
            'images' => ['test'],
            'description' => 'test',
            'num_bathrooms' => 0,
            'num_rooms' => 0,
            'pets' => true,
            'equipment' => 0, //  type: int 0-> Indifferent , 1-> fully fitted kitchen, 2-> furnished
            'garden' => true, // type:bool
            'swimming_pool' => true, // type: bool
            'lift' => true,
            'condition' => 0,
            'air_condition' => true, // type: bool
            'terrace' => true,
            'contact' => 'test@test.test', //id of the user in charge of the property
            'title' => 'test',
            'building_use' => 0,
        ]);
        $id = $response->getData()->data->{'_id'};
        $response->assertStatus(200);
        return $id;
    }

    /**
     * @depends test_post
     */
    public function test_put($id)
    {

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . env('CLIENT_TOKEN'),
        ])->put(
            '/api/properties/' . $id,
            [
                'location' => ['test2'],
                'type' => 'test2',
                'type_house' => 1,
                'area' => 1, //m2
                'status' => false, // sold
                'bought_by' => 1,
                'price' => 1,
                'images' => ['test2'],
                'description' => 'test',
                'num_bathrooms' => 1,
                'num_rooms' => 1,
                'pets' => false,
                'equipment' => 1, //  type: int 1-> Indifferent , 1-> fully fitted kitchen, 2-> furnished
                'garden' => false, // type:bool
                'swimming_pool' => false, // type: bool
                'lift' => false,
                'condition' => 1,
                'air_condition' => false, // type: bool
                'terrace' => false,
                'contact' => 'test2@test2.test2', //id of the user in charge of the property
                'title' => 'test2',
                'building_use' => 1,
            ]
        );
        $response->assertStatus(200);
    }
}
