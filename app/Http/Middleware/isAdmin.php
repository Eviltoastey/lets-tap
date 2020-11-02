<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
{
    
    public function handle($request, Closure $next)
    {
        if(!$request->user()->getRoleNames()->contains('admin')){
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized',
            ], 413);
        }

        return $next($request);
    }
}
