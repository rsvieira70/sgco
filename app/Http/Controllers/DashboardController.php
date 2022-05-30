<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Tenant;

class DashboardController extends Controller {
    public function __construct() { $this->middleware('auth'); }
    public function index() {
        $title =  __('Dashboard');
        $reference =  __('Dashboard');
        $userAuth = Auth()->User();
        $tenant = Tenant::find($userAuth->id);
        $tenants = Tenant::orderBy('social_reason', 'asc')->get();
        return view('dashboard', [
            'title' => $title,
            'reference' => $reference,
            'userAuth' => $userAuth,
            'tenant' => $tenant,
            'tenants' => $tenant
        ]);
    }
}
