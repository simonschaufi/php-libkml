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
