<?php

namespace App\Observers;

use App\Models\Tenant;
use Illuminate\Support\Str;

class TenantObserver
{
    public function created(Tenant $tenant)
    {
        //
    }
    public function creating(Tenant $tenant)
    {
        $tenant->uuid = Str::uuid();
    }

    public function updated(Tenant $tenant)
    {
        //
    }

    public function deleted(Tenant $tenant)
    {
        //
    }

    public function restored(Tenant $tenant)
    {
        //
    }

    public function forceDeleted(Tenant $tenant)
    {
        //
    }
}
