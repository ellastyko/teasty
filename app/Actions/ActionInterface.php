<?php

namespace App\Actions;

interface ActionInterface
{
    /**
     * @param ...$params
     */
    public function execute(...$params);
}
