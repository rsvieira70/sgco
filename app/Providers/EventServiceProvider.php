<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\Professional;
use App\Models\Tenant;
use App\Models\User;
use App\Models\NewUser;
use App\Observers\ProfessionalObserver;
use App\Observers\TenantObserver;
use App\Observers\UserObserver;
use App\Observers\NewUserObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Professional::observe(ProfessionalObserver::class);
        Tenant::observe(TenantObserver::class);
        User::observe(UserObserver::class);
        NewUser::observe(NewUserObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
