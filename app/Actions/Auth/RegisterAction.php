<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

/**
 * Class RegisterAction
 */
class RegisterAction
{
    /**
     * @param array $data
     * @return mixed
     */
    public function handle(array $data): mixed
    {
        $user = User::create([
            'name'     => $data['name'],
            'surname'  => $data['surname'] ?? '',
            'email'    => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        event(new Registered($user));

        return $user;
    }
}
