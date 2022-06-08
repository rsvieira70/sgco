<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TenantCheckActive
{
    public function handle(Request $request, Closure $next)
    {
        $id = Auth::user()->tenant_id;
        $tenant = Tenant::find($id);
        if ($tenant->suspension_date !== null) {
            return redirect('login')->with(Auth::logout());
        }
        return $next($request);
    }
}
