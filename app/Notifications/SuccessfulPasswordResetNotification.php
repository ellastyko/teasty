<?php

namespace App\Listeners;

use App\Mail\SuccessfulPasswordResetEmail;
use App\Notifications\BaseNotification;
use Illuminate\Support\Facades\Mail;

class SuccessfulPasswordResetNotification extends BaseNotification
{
    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(object $event)
    {
    }
}
