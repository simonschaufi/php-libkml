<?php

namespace LibKml\Tests\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Vec2;
use LibKml\Reader\Kml\FieldType\Vec2Parser;
use PHPUnit\Framework\TestCase;

class Vec2ParserTest extends TestCase {

  const KML_VEC2_STYLE = <<<'TAG'
<hotSpot x="0.75" y="2.5" xunits="pixels" yunits="insetPixels" />
TAG;

  protected $vec2KmlElement;

  /**
   * @var Vec2
   */
  protected $vec2;

  public function setUp() {
    $this->vec2KmlElement = simplexml_load_string(self::KML_VEC2_STYLE);
    $this->vec2 = Vec2Parser::parse($this->vec2KmlElement);
  }

  public function testX() {
    $this->assertEquals(0.75, $this->vec2->getX());
  }

  public function testY() {
    $this->assertEquals(2.5, $this->vec2->getY());
  }

  public function testXUnit() {
    $this->assertEquals('pixels', $this->vec2->getXUnits());
  }

  public function testYUnit() {
    $this->assertEquals('insetPixels', $this->vec2->getYUnits());
  }

}
