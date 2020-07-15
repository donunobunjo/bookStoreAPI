<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user= Auth::user();
        if($user->isAdmin != 1){
            return Response::json(['message'=>'You dont have the preveledges for this'],403);

        }
        return $next($request);
    }
}
