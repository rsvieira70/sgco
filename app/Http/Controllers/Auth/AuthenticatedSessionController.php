<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        $title = 'Login';
        return view('auth.login', compact('title'));
    }
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        Alert::toast(__('Login successfully!'),'success');

        return redirect()->intended(RouteServiceProvider::HOME);
    }
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
