<?php

namespace App\Mail\Telegram;

use NotificationChannels\Telegram\TelegramContact;
use NotificationChannels\Telegram\TelegramFile;
use NotificationChannels\Telegram\TelegramMessage;

/**
 * Class Telegram
 */
abstract class Telegram
{
    /**
     * @var TelegramFile
     */
    protected TelegramFile $file;

    /**
     * @var TelegramMessage
     */
    protected TelegramMessage $message;

    /**
     * @var TelegramContact
     */
    protected TelegramContact $contact;

    /**
     * @param array $payload
     */
    public function __construct(protected array $payload)
    {
        $this->boot();
    }

    private function boot()
    {
        $this->file    = TelegramFile::create();
        $this->message = TelegramMessage::create();
        $this->contact = TelegramContact::create();
    }

    /**
     * Build the message.
     *
     */
    public function build()
    {
        return $this->message->content('Teasty | 1000+ teasty receipts');
    }
}
