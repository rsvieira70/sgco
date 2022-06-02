<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TenantAuthorization
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if ($user->user_type != 1) {
            return redirect()->route('dashboard')->with('alert', 'errors');
        }
        return $next($request);
    }
}
