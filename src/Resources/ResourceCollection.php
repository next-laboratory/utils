<?php

declare(strict_types=1);
/**
 * @link     https://github.com/topyao/max-utils
 * @homepage https://github.com/topyao
 */
namespace Max\Utils\Resources;

use JsonSerializable;

class ResourceCollection implements JsonSerializable
{
    /**
     * @var
     */
    protected $collection;

    /**
     * @param $collection
     */
    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return string
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->collection;
    }
}
