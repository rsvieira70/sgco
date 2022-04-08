<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {
    public function __construct() { $this->middleware('auth'); }
    public function index() {
        $title =  __('Dashboard');
        $reference =  __('Dashboard');
        $userAuth = Auth()->User();
        return view('dashboard', [
            'title' => $title,
            'reference' => $reference,
            'userAuth' => $userAuth
        ]);
    }
}
