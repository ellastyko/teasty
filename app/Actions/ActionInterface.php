<?php

interface ActionInterface
{
    /**
     * @param ...$params
     * @return mixed
     */
    public function execute(...$params);
}
