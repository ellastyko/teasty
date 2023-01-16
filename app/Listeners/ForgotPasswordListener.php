<?php

namespace App\Listeners;

use App\Events\ForgotPassword;
use App\Notifications\ForgotPasswordNotification;

class ForgotPasswordListener
{
    /**
     * Handle the event.
     */
    public function handle(ForgotPassword $event): void
    {
        $event->user->notify(new ForgotPasswordNotification($event->token));
    }
}
