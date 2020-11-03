<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Register $request)
    {
        // Retrieve the validated input data...
        $request->validated();

        $user = new User($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        
        $user->styles()->sync($request->input('styles'));

        $user->assignRole('user');

        return response()([
            'data' => new UserResource($user)
        ], 200);
    }
}
