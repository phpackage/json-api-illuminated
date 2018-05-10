<?php

namespace Phpackage\Illuminated\JsonApi\Tests;

use Phpackage\Illuminated\JsonApi\Container;
use Phpackage\Illuminated\JsonApi\Factory;
use PHPUnit\Framework\TestCase;

final class FactoryTest extends TestCase
{
    public function testCanCreateExpectedContainer()
    {
        $this->assertInstanceOf(
            Container::class,
            (new Factory())->createContainer()
        );
    }
}
