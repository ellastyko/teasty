<?php

namespace App\Providers;

use App\Events\ForgotPassword;
use App\Listeners\ForgotPasswordListener;
use App\Listeners\PasswordResetListener;
use App\Listeners\UserRegisteredListener;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class     => [
            UserRegisteredListener::class,
        ],
        ForgotPassword::class => [
            ForgotPasswordListener::class,
        ],
        PasswordReset::class  => [
            PasswordResetListener::class,
            // Add Mail notification to admin
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
