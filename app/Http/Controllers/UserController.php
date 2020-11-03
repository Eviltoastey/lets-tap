<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
       $users = User::paginate();

       return  new UserCollection($users);
   
    }

    public function show(int $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response([
                'message' => 'User could not be found'
            ], 404);
        }

        return new UserResource($user);
    }

    public function update(UpdateUser $request, int $id)
    {
        // Retrieve the validated input data...
        $request->validated();

        $user = User::find($id);

        if (!$user) {
            return response([
                'message' => 'User could not be found'
            ], 404);
        }

        $user->update($request->all());
        $user->styles()->sync($request->input('styles'));

        return new UserResource($user);
    }

    public function destroy(int $id)
    {
        $deleted = User::destroy($id);
    
        if(!$deleted) {
            return response([
                'message' => 'User could not be found'
            ], 404 ); 
        }

        return response([
            'message' => 'User deleted'
        ], 200);
    }
}
