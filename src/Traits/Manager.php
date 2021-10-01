<?php

namespace Max\Utils\Traits;

trait Manager
{

    protected $handler;

    public function __call($method, $args)
    {
        return $this->handler->{$method}(...$args);
    }

}