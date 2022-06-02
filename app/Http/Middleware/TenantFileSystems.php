<?php

namespace app\Http\Middleware;

use App\Tenant\ManagerTenant;
use Closure;

class TenantFilesystems
{
    public function handle($request, Closure $next)
    {
        if (auth()->check())
            $this->setFilesystemsRoot();

        return $next($request);
    }

    public function setFilesystemsRoot()
    {
        $tenant = app(ManagerTenant::class)->getTenant();

        config()->set(
            'filesystems.disks.tenant.root',
            config('filesystems.disks.tenant.root') . "/{$tenant->uuid}"
        );
    }
}