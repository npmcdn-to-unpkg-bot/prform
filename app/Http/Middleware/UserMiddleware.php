<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserMiddleware
{
	/**
	* Handle an incoming request, if the user is Normal User or not, if Normal User, then OK
	*                               If Not, then riderect to default Page
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \Closure  $next
	* @return mixed
	*/
	public function handle($request, Closure $next)
	{ 		//Checking if he is admin
		if ( !Auth::check() )                                             //Not Logged In
		 {
			return redirect('/');
		 }
		else if( strcmp("normal_user",Auth::user()->user_type) )        //Not normal_user, then redirect to default page for admin
		 {
			return redirect('/admin'); 
		 }
		else if( strcmp("tech_support",Auth::user()->user_type) )        //Not normal_user, then redirect to default page for admin
		 {
		 	return redirect('/admin');
		 }	
		else if( strcmp("developing_team",Auth::user()->user_type) )        //Not normal_user, then redirect to default page for admin
		 {
		 	return redirect('/admin');
		 } 	

		//End checking
		return $next($request);
	}
}
