<?php

declare(strict_types=1);
/**
 * @link     https://github.com/topyao/max-utils
 * @homepage https://github.com/topyao
 */
namespace Max\Utils\Packer;

use Max\Utils\Contracts\PackerInterface;
use function serialize;
use function unserialize;

class PhpSerializePacker implements PackerInterface
{
    /**
     * @param $data
     */
    public function pack($data): string
    {
        return serialize($data);
    }

    /**
     * @return mixed
     */
    public function unpack(string $data)
    {
        return unserialize($data);
    }
}
