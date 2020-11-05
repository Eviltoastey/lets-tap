<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register;
use App\Models\User;
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

        $user->assignRole('user');

        $token = $user->createToken('user_token')->accessToken;

        return response([
            'data' => [
                'user' => $user,
                'access_token' => $token
            ]
        ], 200);
    }
}
