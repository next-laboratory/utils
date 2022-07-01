<?php

declare(strict_types=1);
/**
 * @link     https://github.com/topyao/max-utils
 * @homepage https://github.com/topyao
 */
namespace Max\Utils\Packer;

use Max\Utils\Contracts\PackerInterface;
use function json_decode;
use function json_encode;

class JsonPacker implements PackerInterface
{
    /**
     * @param $data
     */
    public function pack($data): string
    {
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return mixed
     */
    public function unpack(string $data)
    {
        return json_decode($data, true);
    }
}
