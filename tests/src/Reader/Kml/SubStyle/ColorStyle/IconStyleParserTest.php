<?php

namespace LibKml\Tests\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ColorMode;
use LibKml\Domain\SubStyle\ColorStyle\IconStyle;
use LibKml\Reader\Kml\SubStyle\ColorStyle\IconStyleParser;
use PHPUnit\Framework\TestCase;

class IconStyleParserTest extends TestCase {

  const KML_ICON_STYLE = <<<'TAG'
<IconStyle>
  <color>a1ff00ff</color>
  <colorMode>random</colorMode>
  <scale>1.399999976158142</scale>
  <heading>46.75</heading>
  <Icon>
    <href>http://myserver.com/icon.jpg</href>
  </Icon>
  <hotSpot x="0.1" y="0.75" xunits="pixels" yunits="insetPixels"/> 
</IconStyle>
TAG;

  /**
   * @var IconStyleParser
   */
  protected $iconStyleParser;

  protected $iconStyleKmlElement;

  /**
   * @var IconStyle
   */
  protected $iconStyle;

  public function setUp() {
    $this->iconStyleParser = new IconStyleParser();
    $this->iconStyleKmlElement = simplexml_load_string(self::KML_ICON_STYLE);
    $this->iconStyle = $this->iconStyleParser->parse($this->iconStyleKmlElement);
  }

  public function testColor() {
    $color = Color::fromRGBA(0xff, 0x00, 0xff, 0xa1 / 0xff);

    $this->assertEquals($color, $this->iconStyle->getColor());
  }

  public function testColorMode() {
    $this->assertEquals(ColorMode::RANDOM, $this->iconStyle->getColorMode());
  }

  public function testScale() {
    $this->assertEquals(1.399999976158142, $this->iconStyle->getScale());
  }

  public function testHeading() {
    $this->assertEquals(46.75, $this->iconStyle->getHeading());
  }

  public function testIcon() {
    $icon = $this->iconStyle->getIcon();

    $this->assertEquals('http://myserver.com/icon.jpg', $icon->getHref());
  }

  public function testHotSpot() {
    $hotSpot = $this->iconStyle->getHotSpot();

    $this->assertEquals(0.1, $hotSpot->getX());
    $this->assertEquals(0.75, $hotSpot->getY());
    $this->assertEquals("pixels", $hotSpot->getXUnits());
    $this->assertEquals("insetPixels", $hotSpot->getYUnits());
  }
  
}
