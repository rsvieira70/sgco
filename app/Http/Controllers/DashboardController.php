<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tenant;

class DashboardController extends Controller
{
    public function index()
    {
        $title =  __('Dashboard');
        $reference =  __('dashboard');
        $userAuth = Auth()->User();
        $tenant = Tenant::find($userAuth->id);
        return view('dashboard', [
            'title' => $title,
            'reference' => $reference,
            'userAuth' => $userAuth,
            'tenant' => $tenant,
        ]);
    }
}
