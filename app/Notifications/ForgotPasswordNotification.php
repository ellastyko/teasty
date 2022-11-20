<?php

namespace App\Notifications;

use App\Mail\ForgotPassword as ForgotPasswordMail;
use App\Mail\Telegram\ForgotPassword as ForgotPasswordTelegram;
use App\Notifications\Contracts\Notifiable;

class ForgotPasswordNotification extends BaseNotification
{
    /**
     * @var string
     */
    protected string $mailClass = ForgotPasswordMail::class;

    /**
     * @var string
     */
    protected string $telegramClass = ForgotPasswordTelegram::class;

    /**
     * @param string $token
     */
    public function __construct(protected string $token)
    {
    }

    /**
     * @return string
     */
    protected function getResetLink(): string
    {
        return url('/password-reset?token=' . $this->token);
    }

    /**
     * @param Notifiable $notifiable
     * @return string[]
     */
    protected function getNotificationSpecificData(Notifiable $notifiable): array
    {
        return [
            'title' => 'Password rest link',
            'user'  => $notifiable,
            'resetLink' => $this->getResetLink(),
        ];
    }
}
