<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // التحقق إذا كان المستخدم مسجل دخول وكان دوره Admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // السماح له بالمرور
        }

        return redirect('/')->with('error', 'ليس لديك صلاحية لدخول لوحة التحكم.');
    }
}
