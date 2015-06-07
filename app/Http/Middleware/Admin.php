<?php namespace CodeCommerce\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
	    $user = Auth::user();
	    
	    if(!empty($user)){
	    
    	    if($user->is_admin != 1){
    	        
    	        echo '<script>alert("Acesso negado!")</script>';
    	        Auth::logout();
    	        echo '<script>window.location = "/";</script>';
    	    }
    	    
    	    return $next($request);
    	    
	    }
	        
        echo '<script>alert("Acesso negado!")</script>';
        echo '<script>window.location = "/auth/login";</script>';

	}

}
