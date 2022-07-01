<?php

declare(strict_types=1);
/**
 * @link     https://github.com/topyao/max-utils
 * @homepage https://github.com/topyao
 */
namespace Max\Utils\Contracts;

interface MessageProvider
{
    /**
     * Get the messages for the instance.
     */
    public function getMessageBag(): MessageBag;
}
