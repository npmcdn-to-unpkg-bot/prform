<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request, if the user is Admin or not, if Admin, then OK
    *                               If Not, then riderect to default Page
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Checking if he is admin
        if (!Auth::check())                                     //Not Logged In
        {
            return redirect('/');
        }
        else if( strcmp("admin",Auth::user()->user_type) )      //Not Admin, then he is normal user, so redirect to normal_user Landing Page
        {
            return redirect('/');
        }
        //End checking
        return $next($request);
    }
}
