<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProfileCheckExist
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if ($user->social_name == null) {
            return redirect()->route('profiles.edit')->with('alert', 'errors');
        }
        return $next($request);
    }
}
