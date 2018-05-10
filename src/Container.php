<?php

namespace Phpackage\Illuminated\JsonApi;

use Illuminate\Support\Str;

class Container extends \Neomerx\JsonApi\Schema\Container
{
    protected function getResourceType($resource): string
    {
        return str_replace(
            '_',
            '-',
            Str::snake(Str::plural(class_basename($resource)))
        );
    }
}
