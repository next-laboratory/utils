<?php

declare(strict_types=1);

/**
 * This file is part of nextphp.
 *
 * @link     https://github.com/next-laboratory
 * @license  https://github.com/next-laboratory/next/blob/master/LICENSE
 */

namespace Next\Utils\Contract;

interface PackerInterface
{
    public function pack($data): string;

    public function unpack(string $data);
}
