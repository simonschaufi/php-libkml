<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\FieldType;

use LibKml\Domain\FieldType\Alias;
use LibKml\Domain\FieldType\ResourceMap;
use PHPUnit\Framework\TestCase;

final class ResourceMapTest extends TestCase
{
    private ResourceMap $resourceMap;

    private Alias $alias1;
    private Alias $alias2;
    private array $aliases;

    protected function setUp(): void
    {
        $this->resourceMap = new ResourceMap();

        $this->alias1 = new Alias();
        $this->alias2 = new Alias();
        $this->aliases = [$this->alias1, $this->alias2];
    }

    public function testGeometriesField(): void
    {
        $this->resourceMap->setAliases($this->aliases);

        self::assertCount(2, $this->resourceMap->getAliases());
        self::assertContains($this->alias1, $this->resourceMap->getAliases());
        self::assertContains($this->alias2, $this->resourceMap->getAliases());
    }

    public function testAddAlias(): void
    {
        $this->resourceMap->addAlias($this->alias1);

        self::assertCount(1, $this->resourceMap->getAliases());
        self::assertContains($this->alias1, $this->resourceMap->getAliases());
    }

    public function testClearAliases(): void
    {
        $this->resourceMap->setAliases($this->aliases);

        $this->resourceMap->clearAliases();

        self::assertCount(0, $this->resourceMap->getAliases());
    }
}
