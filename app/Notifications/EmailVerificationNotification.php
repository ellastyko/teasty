<?php

namespace App\Listeners;

use App\Mail\VerificationEmail;
use App\Notifications\BaseNotification;
use App\Notifications\Contracts\Notifiable;

class EmailVerificationNotification extends BaseNotification
{
    protected string $mailClass = VerificationEmail::class;


    /**
     * Handle the event.
     *
     * @param Notifiable $notifiable
     * @return array
     */
    public function getNotificationSpecificData(Notifiable $notifiable)
    {
        return [

        ];
    }
}
