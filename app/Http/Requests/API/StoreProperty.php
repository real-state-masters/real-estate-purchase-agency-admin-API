<?php

namespace App\Http\Requests\API;

use App\Http\Requests\FormRequestAPI;

class StoreProperty extends FormRequestAPI
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //properties 
        return [
            'location'=> 'required',
            'type'=>'string | required',
            'area'=>'integer | required',
            'price'=>'numeric | required',
            'description'=>'string | required',
            'contact_id'=>'required',
            'title'=>'string | required',
            'bathrooms' => 'integer | required',
            'rooms' => 'integer | required',
            'pets' =>'boolean | required',
            'condition' => 'integer | required',
        ];
    }
}
