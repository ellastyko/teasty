<?php

namespace App\Mail\Telegram;

use NotificationChannels\Telegram\TelegramMessage;

/**
 * Class ForgotPassword
 */
class ForgotPassword extends Telegram
{
    /**
     * Build the message.
     * @return TelegramMessage
     */
    public function build()
    {
        return $this->message
            ->content("Hello there!");
    }
}
