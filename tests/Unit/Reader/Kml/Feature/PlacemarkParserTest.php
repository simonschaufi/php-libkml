<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Feature;

use LibKml\Domain\AbstractView\Camera;
use LibKml\Domain\Geometry\Point;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\Feature\PlacemarkParser;
use PHPUnit\Framework\TestCase;

final class PlacemarkParserTest extends TestCase
{
    private const KML_PLACEMARK = <<<'TAG'
<Placemark id="placemark-1" targetId="target-1">
  <name>My office</name>
  <visibility>0</visibility>
  <open>1</open>
  <address>Blackfriards 240</address>
  <phoneNumber>tel:+44 7890123456789</phoneNumber>
  <Snippet>Office location</Snippet>
  <description>This is the location of my office.</description>
  <Camera>
    <longitude>170.157</longitude>
    <latitude>-43.671</latitude>
    <altitude>9700</altitude>
    <heading>-6.333</heading>
    <tilt>33.5</tilt>
    <roll>12.5</roll>
    <altitudeMode>absolute</altitudeMode>
  </Camera>
  <styleUrl>#myIconStyle</styleUrl>


  <Point>
    <coordinates>-122.087461,37.422069</coordinates>
  </Point>
</Placemark>
TAG;

    private KmlObject $placemark;

    protected function setUp(): void
    {
        $placemarkParser = new PlacemarkParser();
        $this->placemark = $placemarkParser->parse(simplexml_load_string(self::KML_PLACEMARK));
    }

    public function testParseId(): void
    {
        self::assertEquals('placemark-1', $this->placemark->getId());
    }

    public function testParseTargetId(): void
    {
        self::assertEquals('target-1', $this->placemark->getTargetId());
    }

    public function testParseName(): void
    {
        self::assertEquals('My office', $this->placemark->getName());
    }

    public function testParseVisibility(): void
    {
        self::assertFalse($this->placemark->getVisibility());
    }

    public function testParseOpen(): void
    {
        self::assertTrue($this->placemark->getOpen());
    }

    public function testParseAddress(): void
    {
        self::assertEquals('Blackfriards 240', $this->placemark->getAddress());
    }

    public function testParsePhoneNumber(): void
    {
        self::assertEquals('tel:+44 7890123456789', $this->placemark->getPhoneNumber());
    }

    public function testParseSnippet(): void
    {
        self::assertEquals('Office location', $this->placemark->getSnippet());
    }

    public function testParseDescription(): void
    {
        self::assertEquals('This is the location of my office.', $this->placemark->getDescription());
    }

    public function testParseAbstractView(): void
    {
        self::assertInstanceOf(Camera::class, $this->placemark->getAbstractView());
    }

    public function testParseStyleUrl(): void
    {
        self::assertEquals('#myIconStyle', $this->placemark->getStyleUrl());
    }

    public function testParseGeometry(): void
    {
        self::assertInstanceOf(Point::class, $this->placemark->getGeometry());
    }
}
