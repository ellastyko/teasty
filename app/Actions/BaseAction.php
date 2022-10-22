<?php

namespace App\Actions;

use MethodNotImplementedException;

class BaseAction implements ActionInterface
{
    /**
     * @param mixed ...$params
     * @return void
     * @throws MethodNotImplementedException
     */
    public function execute(...$params)
    {
        if (!method_exists($this, 'handle')) {
            throw new MethodNotImplementedException('Method "handle" does not exist in: ' . get_class($this));
        }

        return $this->handle(...$params);
    }
}
