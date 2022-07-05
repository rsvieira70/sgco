<?php

namespace App\Observers;

use App\Models\Professional;
use Illuminate\Support\Str;

class ProfessionalObserver
{
    public function created(Professional $professional)
    {
        //
    }
    public function creating(Professional $professional)
    {
        $professional->uuid = Str::uuid();
    }
    public function updated(Professional $professional)
    {
        //
    }

    public function deleted(Professional $professional)
    {
        //
    }

    public function restored(Professional $professional)
    {
        //
    }

    public function forceDeleted(Professional $professional)
    {
        //
    }
}
