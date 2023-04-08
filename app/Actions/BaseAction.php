<?php

namespace App\Actions;

use MethodNotImplementedException;

class BaseAction implements ActionInterface
{
    /**
     * @param mixed ...$params
     * @return mixed
     * @throws MethodNotImplementedException
     */
    public function execute(...$params): mixed
    {
        if (!method_exists($this, 'handle')) {
            throw new MethodNotImplementedException('Method "handle" does not exist in: ' . get_class($this));
        }

        return $this->handle(...$params);
    }
}
