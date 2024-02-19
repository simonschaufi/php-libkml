<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ColorMode;
use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\ColorStyle\IconStyle;
use LibKml\Reader\Kml\SubStyle\ColorStyle\IconStyleParser;
use PHPUnit\Framework\TestCase;

final class IconStyleParserTest extends TestCase
{
    private const KML_ICON_STYLE = <<<'TAG'
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
     * @var IconStyle
     */
    private KmlObject $iconStyle;

    protected function setUp(): void
    {
        $iconStyleParser = new IconStyleParser();
        $iconStyleKmlElement = simplexml_load_string(self::KML_ICON_STYLE);
        $this->iconStyle = $iconStyleParser->parse($iconStyleKmlElement);
    }

    public function testColor(): void
    {
        $color = Color::fromRGBA(0xff, 0x00, 0xff, 0xa1 / 0xff);

        self::assertEquals($color, $this->iconStyle->getColor());
    }

    public function testColorMode(): void
    {
        self::assertEquals(ColorMode::RANDOM, $this->iconStyle->getColorMode());
    }

    public function testScale(): void
    {
        self::assertEquals(1.399999976158142, $this->iconStyle->getScale());
    }

    public function testHeading(): void
    {
        self::assertEquals(46.75, $this->iconStyle->getHeading());
    }

    public function testIcon(): void
    {
        $icon = $this->iconStyle->getIcon();

        self::assertEquals('http://myserver.com/icon.jpg', $icon->getHref());
    }

    public function testHotSpot(): void
    {
        $hotSpot = $this->iconStyle->getHotSpot();

        self::assertEquals(0.1, $hotSpot->getX());
        self::assertEquals(0.75, $hotSpot->getY());
        self::assertEquals('pixels', $hotSpot->getXUnits());
        self::assertEquals('insetPixels', $hotSpot->getYUnits());
    }
}
