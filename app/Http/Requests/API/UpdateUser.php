<?php

namespace App\Http\Requests\API;

use App\Http\Requests\FormRequestAPI;


class UpdateUser extends FormRequestAPI
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required | string',
            'email'=>'required | email',
            'password' => 'required | string',
            'phone_number' => 'required',
            'last_name' => 'required | string',
        ];
    }
}
