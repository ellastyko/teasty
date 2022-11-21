<?php

namespace App\Actions\Auth;

use App\Actions\BaseAction;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

/**
 * Class PasswordResetAction
 */
class PasswordResetAction extends BaseAction
{
    /**
     * @param $data
     * @return mixed
     */
    public function handle($data): mixed
    {
        return Password::reset(
            $data,
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
    }
}
