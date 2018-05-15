<?php

namespace Phpackage\Illuminated\JsonApi;

class Container extends \Neomerx\JsonApi\Schema\Container
{
    protected function getResourceType($resource): string
    {
        return parent::getResourceType($resource);
    }
}
