<?php

namespace LibKml\Tests\Domain\Geometry;

use LibKml\Domain\Geometry\Alias;
use LibKml\Domain\Geometry\ResourceMap;
use PHPUnit\Framework\TestCase;

class ResourceMapTest extends TestCase {

  /**
   * @var ResourceMap
   */
  private $resourceMap;

  private $alias1;
  private $alias2;
  private $aliases;

  public function setUp() {
    $this->resourceMap = new ResourceMap();

    $this->alias1 = new Alias();
    $this->alias2 = new Alias();
    $this->aliases = [$this->alias1, $this->alias2];
  }

  public function testGeometriesField() {
    $this->resourceMap->setAliases($this->aliases);

    $this->assertCount(2, $this->resourceMap->getAliases());
    $this->assertContains($this->alias1, $this->resourceMap->getAliases());
    $this->assertContains($this->alias2, $this->resourceMap->getAliases());
  }

  public function testAddAlias() {
    $this->resourceMap->addAlias($this->alias1);

    $this->assertCount(1, $this->resourceMap->getAliases());
    $this->assertContains($this->alias1, $this->resourceMap->getAliases());
  }

  public function testClearAliases() {
    $this->resourceMap->setAliases($this->aliases);

    $this->resourceMap->clearAliases();

    $this->assertCount(0, $this->resourceMap->getAliases());
  }
}
