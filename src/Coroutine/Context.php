<?php

namespace Max\Utils\Coroutine;

use Swoole\Coroutine;

class Context
{
    /**
     * @var array
     */
    protected static $pool = [];

    /**
     * @param $key
     *
     * @return mixed|null
     */
    public static function get($key)
    {
        $cid = Coroutine::getCid();
        if ($cid < 0) {
            return null;
        }
        return self::$pool[$cid][$key] ?? null;
    }

    /**
     * @param $key
     * @param $item
     */
    public static function put($key, $item)
    {
        $cid = Coroutine::getCid();
        if ($cid > 0) {
            self::$pool[$cid][$key] = $item;
        }
    }

    /**
     * @param null $key
     */
    public static function delete($key = null)
    {
        $cid = Coroutine::getCid();
        if ($cid > 0) {
            if ($key) {
                unset(self::$pool[$cid][$key]);
            } else {
                unset(self::$pool[$cid]);
            }
        }
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public static function has($key)
    {
        return isset(static::$pool[Coroutine::getCid()][$key]);
    }
}
