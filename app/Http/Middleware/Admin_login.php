<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth ;
class Admin_login
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

        if(Auth::user()){
            return $next($request);
        }
        abort(401, 'This action is unauthorized.');
    }
}
