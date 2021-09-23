<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SinhvienAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
            if(Auth::guard('sinhvien')->check() /*&& Auth::guard('admin')->user()->is_active !=0*/ ){ 
                 return $next($request);
            }
            else{
                return redirect()->route('login');
            }
       
    }
}
