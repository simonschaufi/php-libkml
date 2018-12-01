<?php

namespace LibKml\Tests\Domain\StyleSelector;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\StyleSelector\Pair;
use LibKml\Domain\StyleSelector\StyleMap;
use PHPUnit\Framework\TestCase;

class StyleMapTest extends TestCase {

  /**
   * @var StyleMap
   */
  protected $styleMap;

  public function setUp() {
    $this->styleMap = new StyleMap();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitStyleMap')
      ->with($this->equalTo($this->styleMap));

    $this->styleMap->accept($objectVisitor);
  }

  public function testPairsField() {
    $pair1 = new Pair();
    $pair2 = new Pair();
    $pairs = [$pair1, $pair2];

    $this->styleMap->setPairs($pairs);

    $this->assertCount(2, $this->styleMap->getPairs());
    $this->assertContains($pair1, $this->styleMap->getPairs());
    $this->assertContains($pair2, $this->styleMap->getPairs());
  }

  public function testAddPair() {
    $pair = new Pair();

    $this->styleMap->addPair($pair);

    $this->assertCount(1, $this->styleMap->getPairs());
    $this->assertContains($pair, $this->styleMap->getPairs());
  }

  public function testClearPair() {
    $pair1 = new Pair();
    $pair2 = new Pair();
    $this->styleMap->setPairs([$pair1, $pair2]);

    $this->styleMap->clearPairs();

    $this->assertEmpty($this->styleMap->getPairs());
  }

}
