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
            'location' => 'required',
            'type' => 'string | required', //check array in controller
            'area' => 'integer | required', //m2
            'status' => 'boolean', // False = sold
            'sold_at' => 'date', //
            'bought_by' => 'integer', // user Id
            // 'created_at' => 'date | required', //
            // 'updated_at' => 'date',
            'price' => 'integer | required',
            'images' => 'array | required',
            'description' => 'string',
            'num_bathrooms' => 'integer | required',
            'num_rooms' => 'integer | required',
            'pets' => 'boolean',
            'fully_fitted_kitchen' => 'boolean',
            'furnished' => 'boolean',
            'condition' => 'integer', // 0 = new homes | 1 = good condition | 2 = needs renovation
            'contact' => 'integer | required', //id of the user in charge of the property
            'title' => 'string | required',
        ];
    }
}