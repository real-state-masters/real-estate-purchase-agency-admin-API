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
        return [
            'location' => 'required',
            'type' => 'string | required',
            'area' => 'integer | required', //m2
            'status' => 'boolean | required', // sold
            'sold_at' => 'string | required',
            'bought_by' => 'integer | required',
            'created_at' => 'string | required',
            'updated_at' => 'integer | required',
            'price' => 'numeric | required',
            'images' => 'required',
            'description' => 'string | required',
            'num_bathrooms' => 'integer | required',
            'num_rooms' => 'integer | required',
            'pets' => 'boolean | required',
            'fully_fitted_kitchen' => 'boolean | required',
            'furnished' => 'boolean | required',
            'condition' => 'integer | required',
            'contact' => 'integer | required', //id of the user in charge of the property
            'title' => 'string | required',
        ];
    }
}
