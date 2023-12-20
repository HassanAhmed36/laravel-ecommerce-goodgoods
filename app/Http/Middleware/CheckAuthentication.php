<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuthentication
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('index')->with('error', 'Not Authorized');
        }

        return $next($request);
    }
}
