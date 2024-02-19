<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml;

use LibKml\Domain\Feature\Feature;
use LibKml\Domain\FieldType\NetworkLinkControl;
use LibKml\Reader\Kml\KmlParser;
use LibKml\Reader\WrongDocumentFormat;
use PHPUnit\Framework\TestCase;

final class KmlParserTest extends TestCase
{
    public const KML = <<<'TAG'
<?xml version="1.0" encoding="utf-8"?>
<kml xmlns="http://www.opengis.net/kml/2.2">
  <NetworkLinkControl>
    <maxSessionLength>4</maxSessionLength>
  </NetworkLinkControl>
  <Placemark>
    <name>Visible for 4 seconds</name>
    <Point>
      <coordinates>-122,37</coordinates>
    </Point>
  </Placemark>
</kml>
TAG;

    public const KML_ERRONEOUS = <<<'TAG'
<?xml version="1.0" encoding="utf-8"?>
<Placemark>
  <name>Visible for 4 seconds</name>
  <Point>
    <coordinates>-122,37</coordinates>
  </Point>
</Placemark>
TAG;

    /**
     * @var KmlParser
     */
    protected $kmlParser;

    protected function setUp(): void
    {
        $this->kmlParser = new KmlParser();
    }

    public function testParse(): void
    {
        $kmlDocument = $this->kmlParser->parse(self::KML);

        self::assertInstanceOf(NetworkLinkControl::class, $kmlDocument->getNetworkLinkControl());
        self::assertInstanceOf(Feature::class, $kmlDocument->getFeature());
    }

    public function testParseException(): void
    {
        $this->expectException(WrongDocumentFormat::class);

        $this->kmlParser->parse(self::KML_ERRONEOUS);
    }
}
