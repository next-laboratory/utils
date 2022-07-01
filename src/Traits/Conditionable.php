<?php

declare(strict_types=1);
/**
 * @link     https://github.com/topyao/max-utils
 * @homepage https://github.com/topyao
 */
namespace Max\Utils\Traits;

/**
 * Most of the methods in this file come from illuminate
 * thanks Laravel Team provide such a useful class.
 */
trait Conditionable
{
    /**
     * Apply the callback if the given "value" is truthy.
     *
     * @param mixed $value
     * @param callable $callback
     * @param null|callable $default
     * @return $this|mixed
     */
    public function when($value, $callback, $default = null)
    {
        if ($value) {
            return $callback($this, $value) ?: $this;
        }
        if ($default) {
            return $default($this, $value) ?: $this;
        }

        return $this;
    }

    /**
     * Apply the callback if the given "value" is falsy.
     *
     * @param mixed $value
     * @param callable $callback
     * @param null|callable $default
     * @return $this|mixed
     */
    public function unless($value, $callback, $default = null)
    {
        if (! $value) {
            return $callback($this, $value) ?: $this;
        }
        if ($default) {
            return $default($this, $value) ?: $this;
        }

        return $this;
    }
}
