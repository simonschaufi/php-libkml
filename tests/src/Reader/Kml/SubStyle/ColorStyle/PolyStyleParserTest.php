<?php

namespace LibKml\Tests\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ColorMode;
use LibKml\Domain\SubStyle\ColorStyle\PolyStyle;
use LibKml\Reader\Kml\SubStyle\ColorStyle\PolyStyleParser;
use PHPUnit\Framework\TestCase;

class PolyStyleParserTest extends TestCase {

  const KML_POLY_STYLE = <<<'TAG'
<PolyStyle id="ID">
  <color>ffaabbcc</color>
  <colorMode>random</colorMode>
  <fill>0</fill>
  <outline>0</outline>
</PolyStyle>
TAG;

  /**
   * @var PolyStyleParser
   */
  protected $polyStyleParser;

  protected $polyStyleKmlElement;

  /**
   * @var PolyStyle
   */
  protected $polyStyle;

  public function setUp() {
    $this->polyStyleParser = new PolyStyleParser();
    $this->polyStyleKmlElement = simplexml_load_string(self::KML_POLY_STYLE);
    $this->polyStyle = $this->polyStyleParser->parse($this->polyStyleKmlElement);
  }

  public function testColor() {
    $color = Color::fromRGBA(0xcc, 0xbb, 0xaa, 0xff / 0xff);

    $this->assertEquals($color, $this->polyStyle->getColor());
  }

  public function testColorMode() {
    $this->assertEquals(ColorMode::RANDOM, $this->polyStyle->getColorMode());
  }

  public function testFill() {
    $this->assertFalse($this->polyStyle->getFill());
  }

  public function testOutline() {
    $this->assertFalse($this->polyStyle->getOutline());
  }

}
