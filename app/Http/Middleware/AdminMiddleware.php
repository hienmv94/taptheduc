<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\User;
class AdminMiddleware
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
        if (session('user_email')){
            $user= new User;
            $user= $user->findEmail(session('user_email'));
            if (!$user->admin==1){
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
        return $next($request);
    }
}
