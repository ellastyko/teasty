<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

/**
 * Class LoginAction
 */
class LoginAction
{
    /**
     * @param array $credentials
     * @return JsonResponse
     */
    public function handle(array $credentials): JsonResponse
    {
        if (!Auth::attempt($credentials)) {
            throw new UnauthorizedException(trans('auth.failed'), 401);
        }

        $user = User::current();

        return response()
            ->json([
                'message' => trans('auth.login'),
                'user'    => $user,
            ])
            ->cookie('access-token', $user->createToken($user->email)->plainTextToken);
    }
}
