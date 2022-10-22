<?php

namespace App\Actions\Auth;

use App\Actions\BaseAction;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

/**
 * Class LoginAction
 */
class LoginAction extends BaseAction
{
    /**
     * @param array $credentials
     * @return Authenticatable
     */
    public function handle(array $credentials): Authenticatable
    {
        if (!Auth::attempt($credentials)) {
            throw new UnauthorizedException(trans('auth.failed'), 422);
        }

        return Auth::user();
    }
}
