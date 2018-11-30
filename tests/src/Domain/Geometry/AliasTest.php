<?php

namespace LibKml\Tests\Domain\Geometry;

use LibKml\Domain\Geometry\Alias;
use PHPUnit\Framework\TestCase;

class AliasTest extends TestCase {

  /**
   * @var Alias
   */
  private $aliasTest;

  public function setUp() {
    $this->aliasTest = new Alias();
  }

  public function testTargetHrefField() {
    $this->aliasTest->setTargetHref("http://www.google.com");

    $this->assertEquals("http://www.google.com", $this->aliasTest->getTargetHref());
  }

  public function testSourceHrefField() {
    $this->aliasTest->setSourceHref("http://www.google.com");

    $this->assertEquals("http://www.google.com", $this->aliasTest->getSourceHref());
  }

}
