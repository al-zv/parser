<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\GetVkUsers;
use App\Listeners\SaveVkUsers;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Связывание события с прослушивателем для приложения.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        GetVkUsers::class => [
            SaveVkUsers::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
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
