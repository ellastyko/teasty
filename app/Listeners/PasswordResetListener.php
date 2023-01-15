<?php

namespace App\Listeners;

use App\Mail\SuccessfulPasswordResetEmail;
use Illuminate\Support\Facades\Mail;

class PasswordResetListener
{
    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(object $event)
    {
         // TODO
    }
}
