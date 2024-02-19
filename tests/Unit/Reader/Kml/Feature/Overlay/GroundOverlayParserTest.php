<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\GroundOverlay;
use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Color;
use LibKml\Domain\Icon;
use LibKml\Domain\LatLonBox;
use LibKml\Reader\Kml\Feature\Overlay\GroundOverlayParser;
use PHPUnit\Framework\TestCase;

final class GroundOverlayParserTest extends TestCase
{
    public const KML_GROUND_OVERLAY = <<< 'TAG'
<GroundOverlay>
   <name>GroundOverlay.kml</name>
   <color>7fffffff</color>
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

    /**
     * @var GroundOverlayParser
     */
    protected $groundOverlayParser;

    protected function setUp(): void
    {
        $this->groundOverlayParser = new GroundOverlayParser();
    }

    public function testParse(): void
    {
        $element = simplexml_load_string(self::KML_GROUND_OVERLAY);

        $overlay = $this->groundOverlayParser->parse($element);

        self::assertInstanceOf(GroundOverlay::class, $overlay);
        self::assertEquals('GroundOverlay.kml', $overlay->getName());
        self::assertEquals(Color::fromRGBA(0x7f, 0xff, 0xff, 1), $overlay->getColor());
        self::assertEquals(1, $overlay->getDrawOrder());
        self::assertInstanceOf(Icon::class, $overlay->getIcon());
        self::assertEquals(135.54, $overlay->getAltitude());
        self::assertEquals(AltitudeMode::ABSOLUTE, $overlay->getAltitudeMode());
        self::assertInstanceOf(LatLonBox::class, $overlay->getLatLonBox());
    }
}
