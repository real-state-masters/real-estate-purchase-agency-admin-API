<?php

namespace App\Http\Requests\API;

use App\Http\Requests\FormRequestAPI;

class UpdateProperty extends FormRequestAPI
{
  
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // $validationTypeHouse = array(-1,1,2,3);

        return [
            'type' => 'string', // type: enum  (home/office)
            'type_house' => 'integer | in:'.implode(",",[-1,0,1,2]), // type: int, -1-> not a house,  0 -> duplex, 1->house, 2->penthouse
            'area' => 'integer', // type int ( m^²)
            'status' => 'boolean', // type: boolean .  true -> not sold, false-> sold
            'bought_by' => 'integer', // type: int ( user_id).  if -1-> not bought by anyone
            'price' => 'integer', // type: int
            'images' => 'array', // array of url's  // type: array
            'description' => 'string', // type:string
            'num_bathrooms' => 'integer', // type: int
            'num_rooms' => 'integer', // type: int
            'pets' => 'boolean', // type: bool
            'equipment' => 'integer | in:'.implode(",",[0,1,2,3]), //  type: int 0-> Indifferent , 1-> fully fitted kitchen, 2-> furnished
            'garden' => 'boolean', // type:bool
            'swimming_pool' => 'boolean', // type: bool
            'lift' => 'boolean', // type: bool
            'condition' => 'integer | in:'.implode(",",[0,1,2,3]), // type: int , 0-> new homes, 1-> good condition , 2-> needs renovation
            'air_condition' => 'boolean', // type: bool
            'terrace' => 'boolean', // type: bool
            'contact' => 'email', // admin email
            'title' => 'String', // type: string
            'building_use' => 'integer | in:'.implode(",",[-1,0,1,2])  // type:integer, -1-> not an office,  0-> private, 1->co_working , 2-> security_system
        ];
    }
}
