<?php

namespace LibKml\Tests\Domain\FieldType;

use LibKml\Domain\FieldType\Vec2;
use PHPUnit\Framework\TestCase;

class Vec2Test extends TestCase {

  /**
   * @var Vec2
   */
  protected $vec2;

  public function setUp() {
    $this->vec2 = new Vec2();
  }

  public function testConstructor() {
    $vec2 = Vec2::fromValues(0.5, 24.76, 'fraction', 'fraction');

    $this->assertEquals(0.5, $vec2->getX());
    $this->assertEquals(24.76, $vec2->getY());
    $this->assertEquals('fraction', $vec2->getXUnits());
    $this->assertEquals('fraction', $vec2->getYUnits());
  }

  public function testXField() {
    $x = 167;
    
    $this->vec2->setX($x);
    
    $this->assertEquals($x, $this->vec2->getX());
  }

  public function testYField() {
    $y = 167;

    $this->vec2->setY($y);

    $this->assertEquals($y, $this->vec2->getY());
  }

  public function testXUnitsField() {
    $xUnits = "pixels";

    $this->vec2->setXUnits($xUnits);

    $this->assertEquals($xUnits, $this->vec2->getXUnits());
  }

  public function testYUnitsField() {
    $yUnits = "pixels";

    $this->vec2->setYUnits($yUnits);

    $this->assertEquals($yUnits, $this->vec2->getYUnits());
  }

}
