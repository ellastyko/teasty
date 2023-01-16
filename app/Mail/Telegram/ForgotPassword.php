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
    public function build(): TelegramMessage
    {
        $user = $this->payload['user'];

        return $this->message
            ->content("Hello $user->name! \nYou can to reset password")
            ->button('It\'s not me ', 'google.com')
            ->button('Reset password', $this->payload['resetLink']);
    }
}
