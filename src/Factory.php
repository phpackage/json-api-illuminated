<?php

namespace Phpackage\Illuminated\JsonApi;

use Neomerx\JsonApi\Contracts\Schema\ContainerInterface;

class Factory extends \Neomerx\JsonApi\Factories\Factory
{
    public function createContainer(array $providers = []): ContainerInterface
    {
        return new Container($this, $providers);
    }
}
