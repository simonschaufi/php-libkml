<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\GroundOverlay;
use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Color;
use LibKml\Domain\Icon;
use LibKml\Domain\KmlObject;
use LibKml\Domain\LatLonBox;
use LibKml\Reader\Kml\Feature\Overlay\GroundOverlayParser;
use PHPUnit\Framework\TestCase;

final class GroundOverlayParserTest extends TestCase
{
    private const KML_GROUND_OVERLAY = <<<'TAG'
<GroundOverlay>
   <name>GroundOverlay.kml</name>
   <color>ffffff7f</color>
   <drawOrder>1</drawOrder>
   <Icon>
      <href>http://www.google.com/intl/en/images/logo.gif</href>
      <refreshMode>onInterval</refreshMode>
      <refreshInterval>86400</refreshInterval>
      <viewBoundScale>0.75</viewBoundScale>
   </Icon>
   <altitude>135.54</altitude>
   <altitudeMode>absolute</altitudeMode>
   <LatLonBox>
      <north>37.83234</north>
      <south>37.832122</south>
      <east>-122.373033</east>
      <west>-122.373724</west>
      <rotation>45</rotation>
   </LatLonBox>
</GroundOverlay>
TAG;

    private KmlObject $overlay;

    protected function setUp(): void
    {
        $groundOverlayParser = new GroundOverlayParser();
        $this->overlay = $groundOverlayParser->parse(simplexml_load_string(self::KML_GROUND_OVERLAY));
    }

    public function testParseOverlay(): void
    {
        self::assertInstanceOf(GroundOverlay::class, $this->overlay);
    }

    public function testParseName(): void
    {
        self::assertEquals('GroundOverlay.kml', $this->overlay->getName());
    }

    public function testParseColor(): void
    {
        self::assertEquals(Color::fromRGBA(0x7f, 0xff, 0xff, 1), $this->overlay->getColor());
    }

    public function testParseDrawOrder(): void
    {
        self::assertEquals(1, $this->overlay->getDrawOrder());
    }

    public function testParseIcon(): void
    {
        self::assertInstanceOf(Icon::class, $this->overlay->getIcon());
    }

    public function testParseAltitude(): void
    {
        self::assertEquals(135.54, $this->overlay->getAltitude());
    }

    public function testParseAltitudeMode(): void
    {
        self::assertEquals(AltitudeMode::ABSOLUTE, $this->overlay->getAltitudeMode());
    }

    public function testParseLatLonBox(): void
    {
        self::assertInstanceOf(LatLonBox::class, $this->overlay->getLatLonBox());
    }
}
