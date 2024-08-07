<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //admin
        if(Auth::check() && Auth::user()->role == 'admin' && Auth::user()->active==1){
            return $next($request);
        }
        return redirect()->route('loginAdmin')->with('errorLogin','Đăng nhập thất bại');
        // user
        if(Auth::check() && Auth::user()->role == 'user'){
            return $next($request);
        }
        return redirect()->route('loginClient')->with('errorLogin','Đăng nhập thất bại');

    }
}
