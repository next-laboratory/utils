<?php

declare(strict_types=1);
/**
 * @link     https://github.com/topyao/max-utils
 * @homepage https://github.com/topyao
 */
namespace Max\Utils\Contracts;

interface PackerInterface
{
    public function pack($data): string;

    public function unpack(string $data);
}
