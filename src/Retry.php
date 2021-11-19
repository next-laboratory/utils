<?php

namespace Max\Utils;

/**
 * 需要重写
 */
class Retry
{

    protected $returnValue;
    protected $inSeconds;
    protected $sleep    = 0;
    protected $times    = 1;
    protected $fallback;
    protected $executed = false;

    public function __construct($returnValue)
    {
        $this->returnValue = $returnValue;
    }

    /**
     * 最大重试次数
     *
     * @param int $times
     *
     * @return $this
     */
    public function max(int $times)
    {
        $this->times = $times;
        return $this;
    }

    /**
     * 最大执行时间
     *
     * @param int $inSeconds
     *
     * @return $this
     */
    //    public function inSeconds(int $inSeconds)
    //    {
    //        $this->inSeconds = $inSeconds;
    //        return $this;
    //    }
    /**
     * 睡眠时间
     *
     * @param $sleep
     *
     * @return $this
     */
    public function sleep($sleep)
    {
        $this->sleep = (int)($sleep * 1e6);
        return $this;
    }

    /**
     * 异常回调，如果没有注册，异常后依然会重试，直到最大重试次数
     *
     * @param \Closure $fallback
     *
     * @return $this
     */
    public function fallback(\Closure $fallback)
    {
        $this->fallback = $fallback;
        return $this;
    }

    /**
     * 重试逻辑
     *
     * @param \Closure $call
     *
     * @return mixed
     */
    public function call(\Closure $call)
    {
        do {
            $this->times--;
            $this->doSleep();
            $this->executed = true;
            try {
                $result = $call();
            } catch (\Throwable $throwable) {
                if ($this->fallback) {
                    return ($this->fallback)($throwable);
                }
                $result = $this->returnValue;
                $this->doSleep();
            }
        } while ($result === $this->returnValue && $this->times > 0);
        return $result;
    }

    protected function doSleep()
    {
        if ($this->executed) {
            usleep($this->sleep);
        }
    }

    /**
     * 当返回值和设定的值一致时触发重试
     *
     * @param $returnValue
     *
     * @return static
     */
    public static function whenReturns($returnValue)
    {
        return new static($returnValue);
    }
}
