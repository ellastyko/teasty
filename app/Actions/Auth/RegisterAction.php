<?php

namespace App\Actions\Auth;

use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class RegisterAction
 */
class RegisterAction
{
    /**
     * @param UserRepository $userRepository
     */
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    /**
     * @param array $credentials
     * @return LengthAwarePaginator|Collection|mixed
     * @throws ValidatorException
     */
    public function handle(array $credentials)
    {
        $credentials['password'] = bcrypt($credentials['password']);
        $user = $this->userRepository->create($credentials);

        event(new Registered($user));

        return $user;
    }
}
