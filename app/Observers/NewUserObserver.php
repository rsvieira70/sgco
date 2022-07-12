<?php

namespace App\Observers;

use App\Models\NewUser;
use Illuminate\Support\Str;

class NewUserObserver
{
    public function created(NewUser $newUser)
    {
        //
    }
    public function creating(NewUser $newUser)
    {
        $newUser->uuid = Str::uuid();
    }

    public function updated(NewUser $newUser)
    {
        //
    }

    public function deleted(NewUser $newUser)
    {
        //
    }

    public function restored(NewUser $newUser)
    {
        //
    }

    public function forceDeleted(NewUser $newUser)
    {
        //
    }
}
