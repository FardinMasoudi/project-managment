<?php

namespace App\Providers;

use App\Events\Invite;
use App\Listeners\SendEmailToUser;
use App\Models\ProjectRole;
use App\Observers\ProjectRoleObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
        Invite::class => [
            SendEmailToUser::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        ProjectRole::observe(ProjectRoleObserver::class);
    }
}
