<?php

namespace App\Actions\Auth;

use App\Events\ForgotPassword;
use BaseAction;
use Illuminate\Support\Facades\Password;

/**
 * Class ForgotPasswordAction
 */
class ForgotPasswordAction extends BaseAction
{
    /**
     * @param array $data
     * @return string
     */
    public function handle(array $data): string
    {
        return Password::sendResetLink($data, fn ($user, $token) => ForgotPassword::dispatch($user, $token));
    }
}
