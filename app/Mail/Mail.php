<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class Mail
 */
class Mail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public function __construct(protected array $payload)
    {
    }
}
