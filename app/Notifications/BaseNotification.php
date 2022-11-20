<?php

namespace App\Notifications;

use App\Notifications\Contracts\Notifiable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class BaseNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var string
     */
    protected string $mailClass;

    /**
     * @var string
     */
    protected string $telegramClass;

    /**
     * Get the notification's channels.
     *
     *
     * @return array
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function via(): array
    {
        return ['telegram'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param Notifiable $notifiable
     *
     * @return Mailable
    */
    public function toMail(Notifiable $notifiable): Mailable
    {
        logger()->info('Sending email notification.', [
            'notification_class' => get_class($this),
            'notification_id'    => $this->id,
            'user_id'            => $notifiable->id,
        ]);

        $mail = app($this->mailClass, ['payload' => $this->getPayload($notifiable)]);
        $mail->to($notifiable);

        return $mail;
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param Notifiable $notifiable
     *
     * @return Application|mixed
     */
    public function toTelegram(Notifiable $notifiable)
    {
        logger()->info('Sending telegram notification.', [
            'notification_class' => get_class($this),
            'notification_id'    => $this->id,
            'user_id'            => $notifiable->id,
        ]);

        $instance = new $this->telegramClass($this->getPayload($notifiable));

        return $instance->build()->to($notifiable->telegram_id); // 487961110
    }

    /**
     * Get notification payload.
     *
     * @param Notifiable $notifiable
     *
     * @return array
     */
    protected function getPayload(Notifiable $notifiable): array
    {
        return array_merge($this->getGeneralData(), $this->getNotificationSpecificData($notifiable));
    }

    /**
     * @return array
     */
    protected function getGeneralData(): array
    {
        return [
            'supportEmail' => env('SUPPORT_EMAIL', 'teasty@gmail.com')
        ];
    }

    /**
     * @param Notifiable $notifiable
     * @return array
     */
    protected function getNotificationSpecificData(Notifiable $notifiable): array
    {
        return [];
    }
}
