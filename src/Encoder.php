<?php

namespace Phpackage\Illuminated\JsonApi;

use Neomerx\JsonApi\Contracts\Factories\FactoryInterface;

class Encoder extends \Neomerx\JsonApi\Encoder\Encoder
{
    protected static function createFactory(): FactoryInterface
    {
        return new Factory();
    }
}
