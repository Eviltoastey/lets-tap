<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Login $request) {
        $login = $request->validated();
            
        if( !Auth::attempt($login) ){
            return response([
                'message' => 'Invalid login credentials'
            ]);
        }

        $token = $request->user()->createToken('user_token')->accessToken;

        return response(['user' => Auth::user(), 'access_token' => $token]);
    }
}
