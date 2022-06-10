<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tenant;

class DashboardController extends Controller
{
    public function index()
    {
        $title =  __('Dashboard');
        $userAuth = Auth()->User();
        $tenant = Tenant::find($userAuth->id);
        return view('dashboard', compact('title', 'userAuth', 'tenant'));
    }
}
