<?php

namespace LibKml\Tests\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ColorMode;
use LibKml\Domain\SubStyle\ColorStyle\LineStyle;
use LibKml\Reader\Kml\SubStyle\ColorStyle\LineStyleParser;
use PHPUnit\Framework\TestCase;

class LineStyleParserTest extends TestCase {

  const KML_LINE_STYLE = <<<'TAG'
<LineStyle id="ID">
  <color>ffaabbcc</color>
  <colorMode>random</colorMode>
  <width>2.5</width>
</LineStyle>
TAG;

  /**
   * @var LineStyleParser
   */
  protected $lineStyleParser;

  protected $lineStyleKmlElement;

  /**
   * @var LineStyle
   */
  protected $lineStyle;

  public function setUp() {
    $this->lineStyleParser = new LineStyleParser();
    $this->lineStyleKmlElement = simplexml_load_string(self::KML_LINE_STYLE);
    $this->lineStyle = $this->lineStyleParser->parse($this->lineStyleKmlElement);
  }

  public function testColor() {
    $color = Color::fromRGBA(0xcc, 0xbb, 0xaa, 0xff / 0xff);

    $this->assertEquals($color, $this->lineStyle->getColor());
  }

  public function testColorMode() {
    $this->assertEquals(ColorMode::RANDOM, $this->lineStyle->getColorMode());
  }

  public function testWidth() {
    $this->assertEquals(2.5, $this->lineStyle->getWidth());
  }

}
