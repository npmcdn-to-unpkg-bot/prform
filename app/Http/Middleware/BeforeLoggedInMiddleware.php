<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class BeforeLoggedInMiddleware
{
	/**
	* Handle an incoming request if the user is logged in or not, if not logged in, then OK
	* 								If Logged In, then riderect to needed page
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \Closure  $next
	* @return mixed
	*/
	public function handle($request, Closure $next)
	{
		if (!Auth::check())												//Not Logged In, then OK
		{
			return $next($request);
		}
		else if( strcmp("admin",Auth::user()->user_type) )				//Not Admin -> NormalUser - Then redirect to admin landing page
		{
			return redirect('normal_user');
		}
		else if( strcmp("normal_user",Auth::user()->user_type) )		//Admin - Then redirect to normal User landing page
		{
			return redirect('admin');
		}
	}
}
