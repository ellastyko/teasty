<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\OAuthRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/**
 * OAuthController
 */
class OAuthController extends Controller
{
    /**
     * @param OAuthRequest $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login(OAuthRequest $request): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return Socialite::driver($request->input('service'))->redirect();
    }

    /**
     * Callback with User's data
     * @return RedirectResponse
     */
    public function callbackFacebook(): RedirectResponse
    {
        $oauthUser = Socialite::driver('facebook')->user();
        dd($oauthUser);
        $user = User::updateOrCreate(
            ['steam_id' => $oauthUser->getId()],
            [
                'name'     => $oauthUser->getName(),
                'nickname' => $oauthUser->getNickname(),
                'email'    => $oauthUser->getEmail(),
                'avatar'   => $oauthUser->getAvatar(),
            ]
        );

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
