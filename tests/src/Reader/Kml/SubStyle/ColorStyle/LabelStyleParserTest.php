<?php

namespace LibKml\Tests\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ColorMode;
use LibKml\Domain\SubStyle\ColorStyle\LabelStyle;
use LibKml\Reader\Kml\SubStyle\ColorStyle\LabelStyleParser;
use PHPUnit\Framework\TestCase;

class LabelStyleParserTest extends TestCase {

  const KML_LABEL_STYLE = <<<'TAG'
<LabelStyle id="ID">
  <color>ffaabbcc</color>
  <colorMode>random</colorMode>
  <scale>0.75</scale>
</LabelStyle>
TAG;

  /**
   * @var LabelStyleParser
   */
  protected $labelStyleParser;

  protected $labelStyleKmlElement;

  /**
   * @var LabelStyle
   */
  protected $labelStyle;

  public function setUp() {
    $this->labelStyleParser = new LabelStyleParser();
    $this->labelStyleKmlElement = simplexml_load_string(self::KML_LABEL_STYLE);
    $this->labelStyle = $this->labelStyleParser->parse($this->labelStyleKmlElement);
  }

  public function testColor() {
    $color = Color::fromRGBA(0xcc, 0xbb, 0xaa, 0xff / 0xff);

    $this->assertEquals($color, $this->labelStyle->getColor());
  }

  public function testColorMode() {
    $this->assertEquals(ColorMode::RANDOM, $this->labelStyle->getColorMode());
  }

  public function testScale() {
    $this->assertEquals(0.75, $this->labelStyle->getScale());
  }
  
}
