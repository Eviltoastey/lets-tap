<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
{
    
    public function handle($request, Closure $next)
    {
        $user_roles = $request->user()->getRoleNames();
        $has_access = false;

        foreach($user_roles as $role){
            if ($role == 'admin'){
                $has_access = true;
            }
        }

        if(!$has_access){
            $response = [
                'status' => 401,
                'message' => 'Unauthorized',
            ];
    
            return response()->json($response, 413);
        }

        return $next($request);
    }
}
