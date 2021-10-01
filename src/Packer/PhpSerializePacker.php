<?php

namespace Max\Utils\Packer;

use Max\Utils\Contracts\PackerInterface;

class PhpSerializePacker implements PackerInterface
{
    public function pack($data): string
    {
        return \serialize($data);
    }

    public function unpack(string $data)
    {
        return \unserialize($data);
    }

}