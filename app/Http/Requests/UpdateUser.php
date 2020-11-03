<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'email',
                // add rule so email must be unique
                Rule::unique('users')->ignore(
                    $this->route()->parameters()["user"]
                ) 
            ],
            'password' => 'string',
            'name' => 'string',
            'description' => 'string',
            'brewery_id' => 'numeric',
            'age' => 'numeric',
            'phone' => [
                'numeric',
                // add rule so phone must be unique
                Rule::unique('users')->ignore(
                    $this->route()->parameters()["user"]
                ) 
            ],
            'bar_id' => 'numeric',
            'store_id' => 'numeric',
            'beer_id' => 'numeric',
            'styles' => 'array'
        ];
    }
}
