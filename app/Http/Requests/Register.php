<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Register extends FormRequest
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
                'required', 'email',
                // add rule so email must be unique
                Rule::unique('users')->ignore(
                    $this->request->all()['email']
                ) 
            ],
            'password' => 'required|string',
            'name' => 'required|string',
            'description' => 'required|string',
            'brewery_id' => 'required|numeric',
            'age' => 'required|numeric',
            'phone' => [
                'required', 'numeric',
                // add rule so phone must be unique
                Rule::unique('users')->ignore(
                    $this->request->all()['phone']
                ) 
            ],
            'bar_id' => 'required|numeric',
            'store_id' => 'required|numeric',
            'beer_id' => 'required|numeric',
            'styles' => 'required|array'
        ];
    }
}
