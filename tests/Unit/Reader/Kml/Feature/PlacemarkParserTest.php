<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Feature;

use LibKml\Domain\AbstractView\Camera;
use LibKml\Domain\Feature\Placemark;
use LibKml\Domain\Geometry\Point;
use LibKml\Domain\TimePrimitive\TimePrimitive;
use LibKml\Domain\TimePrimitive\TimeSpan;
use LibKml\Domain\TimePrimitive\TimeStamp;
use LibKml\Reader\Kml\Feature\PlacemarkParser;
use PHPUnit\Framework\TestCase;

final class PlacemarkParserTest extends TestCase
{
    private const KML_PLACEMARK_WITH_TIMESTAMP = <<<'TAG'
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
  <TimeStamp>
    <when>1997</when>
  </TimeStamp>
</Placemark>
TAG;

    private const KML_PLACEMARK_WITH_TIMESPAN = <<<'TAG'
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
  <TimeSpan>
    <begin>1876-08-01</begin>
    <end>1876-08-03</end>
  </TimeSpan>
</Placemark>
TAG;

    private Placemark $placemark;

    protected function setUp(): void
    {
        $placemarkParser = new PlacemarkParser();
        $this->placemark = $placemarkParser->parse(simplexml_load_string(self::KML_PLACEMARK_WITH_TIMESTAMP));
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

    public function testParseTimeStamp(): void
    {
        /** @var TimeStamp $timeStamp */
        $timeStamp = $this->placemark->getTimePrimitive();
        self::assertInstanceOf(TimePrimitive::class, $timeStamp);
        self::assertEquals('1997', $timeStamp->getWhen());
    }

    public function testParseTimeSpan(): void
    {
        $placemarkParser = new PlacemarkParser();
        $placemark = $placemarkParser->parse(simplexml_load_string(self::KML_PLACEMARK_WITH_TIMESPAN));

        /** @var TimeSpan $timeSpan */
        $timeSpan = $placemark->getTimePrimitive();
        self::assertInstanceOf(TimePrimitive::class, $timeSpan);
        self::assertEquals('1876-08-01', $timeSpan->getBegin());
        self::assertEquals('1876-08-03', $timeSpan->getEnd());
    }
}
