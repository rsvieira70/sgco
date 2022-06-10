<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserCheckActive
{
        public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if ($user->suspension_date !== null) {
            return redirect('login')->with(Auth::logout());
        }
        return $next($request);
    }
}
