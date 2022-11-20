<?php

namespace App\Mail;

/**
 * Class PasswordResetEmail
 */
class ForgotPassword extends Mail
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): ForgotPassword
    {
        return $this->view('mails.reset_password')
            ->subject(trans('passwords.forgot'))
            ->with([
                'user'      => $this->payload['user'],
                'resetLink' => $this->payload['resetLink']
            ]);
    }
}
