<?php

namespace App\Http\Controllers\Api;

use App\Actions\Auth\{ForgotPasswordAction, LoginAction, PasswordResetAction, RegisterAction};
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\{ForgotPasswordRequest, LoginRequest, PasswordResetRequest, RegisterRequest};
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Authentication controller
 */
class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @param LoginAction $action
     * @return JsonResponse
     */
    public function login(LoginRequest $request, LoginAction $action): JsonResponse
    {
        $user = $action->handle($request->only('email', 'password'));

        return response()
            ->json([
                'message' => trans('auth.login'),
                'user'    => $user,
            ])
            ->cookie('access-token', $user->createToken($user->email)->plainTextToken);
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        Auth::logout();

        return response()->json([
            'message' => trans('auth.logout')
        ], Response::HTTP_NO_CONTENT);
    }

    /**
     * @param RegisterRequest $request
     * @param RegisterAction $action
     * @return JsonResponse
     * @throws ValidatorException
     */
    public function register(RegisterRequest $request, RegisterAction $action): JsonResponse
    {
        return response()->json([
            'message' => trans('auth.registered'),
            'user'    => $action->handle($request->validated())
        ]);
    }

    /**
     * @param ForgotPasswordRequest $request
     * @param ForgotPasswordAction $action
     * @return JsonResponse
     */
    public function forgotPassword(ForgotPasswordRequest $request, ForgotPasswordAction $action): JsonResponse
    {
        $status = $action->handle($request->validated());

        return response()->json([
            'message' => trans($status)
        ]);
    }


    /**
     * @param PasswordResetRequest $request
     * @param PasswordResetAction $action
     * @return Response
     */
    public function passwordReset(PasswordResetRequest $request, PasswordResetAction $action): Response
    {
        $status = $action->handle($request->validated());

        return response()->json([
            'message' => trans($status)
        ]);
    }
}
