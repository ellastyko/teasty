<?php

namespace App\Models\traits;

use App\Enum\Role;

trait Roles
{
    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(Role::ADMIN);
    }

    /**
     * @return bool
     */
    public function isUser(): bool
    {
        return $this->hasRole(Role::USER);
    }
}
