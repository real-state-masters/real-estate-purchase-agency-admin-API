<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\API\UserController;

class UserControllerTest extends TestCase
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
        ])->get('/api/users');

        return $response->assertStatus(200);
    }
    /**
     * @depends test_get
     */
    public function test_DbEmpty($array){

        $this->assertGreaterThan(0, count($array->getData()));
    }

    public function test_post()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . env('CLIENT_TOKEN'),
        ])->post('/api/users', [
            'name' => 'nombre mdgfhdfghdfghdfghrjuejkbakajjj',
            'email' => 'edfghdfghdfghdghmail@derjbjkak68kkdfghdfghjhgjhjkhj.es',
            'firebaseID' => 'q837kjjke4jq47i38wdhdfgh4i8w34ertwertvwertwerctweterwvct35sdf4g68sdf7ts68drt41352set48s6dg'
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
        ])->put('/api/users/' . $id, [
            'name' => 'nombre de prueba CAMBIADO POR PUT',
        ]);
        $response->assertStatus(200);
    }
    /**
     * @depends test_post
     */
    public function test_delete($id)
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . env('CLIENT_TOKEN'),
        ])->delete('/api/users/' . $id,);

        $response->assertStatus(200);
    }
}
