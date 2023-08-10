<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminGuard
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('adminId')) {
            return $next($request);
        }        
        else
        {
           return redirect('/no_access');
        }
    }
}
