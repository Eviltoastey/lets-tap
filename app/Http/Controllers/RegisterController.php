<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailVerification;
use App\Http\Requests\Register;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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

    public function resend(Request $request) {
        $request->user()->sendEmailVerificationNotification();
    
        return response([
            'data' => [
                'notice' => 'verification send again. You',
            ]
        ], 200);
    }

    function notice () {

        return response([
            'data' => [
                'notice' => 'thanks for verifying your email!',
            ]
        ], 200);
        
    }   

    public function verify (EmailVerification $request) {
        $user = User::find($request->route('id'));

        if ($user->markEmailAsVerified())
            event(new Verified($user));

        return response([
            'data' => [
                'notice' => 'thanks for verifying your email!',
            ]
        ], 200);
        
    }   

}
