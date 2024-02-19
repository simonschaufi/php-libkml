<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Feature;

use LibKml\Domain\AbstractView\Camera;
use LibKml\Domain\Geometry\Point;
use LibKml\Reader\Kml\Feature\PlacemarkParser;
use PHPUnit\Framework\TestCase;

final class PlacemarkParserTest extends TestCase
{
    public const KML_PLACEMARK = <<<'TAG'
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
  </Camera>
  <styleUrl>#myIconStyle</styleUrl>


  <Point>
    <coordinates>-122.087461,37.422069</coordinates>
  </Point>
</Placemark>
TAG;

    /**
     * @var PlacemarkParser
     */
    protected $placemarkParser;
    protected $kmlElement;

    protected function setUp(): void
    {
        $this->placemarkParser = new PlacemarkParser();
        $this->kmlElement = simplexml_load_string(self::KML_PLACEMARK);
    }

    public function testParse(): void
    {
        $kmlObject = $this->placemarkParser->parse($this->kmlElement);

        self::assertEquals('placemark-1', $kmlObject->getId());
        self::assertEquals('target-1', $kmlObject->getTargetId());

        self::assertEquals('My office', $kmlObject->getName());
        self::assertFalse($kmlObject->getVisibility());
        self::assertTrue($kmlObject->getOpen());
        self::assertEquals('Blackfriards 240', $kmlObject->getAddress());
        self::assertEquals('tel:+44 7890123456789', $kmlObject->getPhoneNumber());
        self::assertEquals('Office location', $kmlObject->getSnippet());
        self::assertEquals('This is the location of my office.', $kmlObject->getDescription());
        self::assertInstanceOf(Camera::class, $kmlObject->getView());
        self::assertEquals('#myIconStyle', $kmlObject->getStyleUrl());

        self::assertInstanceOf(Point::class, $kmlObject->getGeometry());
    }
}
