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
            'type' => 'string',
            'type_house' => 'integer',
            'area' => 'integer', //m2
            'status' => 'boolean', // sold
            'bought_by' => 'integer',
            // 'updated_at' => 'integer',
            'price' => 'integer',
            'images' => 'array',
            'description' => 'string',
            'num_bathrooms' => 'integer',
            'num_rooms' => 'integer',
            'pets' => 'boolean',
            'equipment' => 'integer',
            'garden' => 'boolean',
            'swimming_pool' => 'boolean',
            'lift' => 'boolean',
            'fully_fitted_kitchen' => 'boolean',
            'furnished' => 'boolean',
            'condition' => 'integer',
            'contact' => 'integer', //id of the user in charge of the property
            'title' => 'string',
        ];
    }
}
