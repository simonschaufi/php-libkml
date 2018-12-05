<?php

namespace LibKml\Tests\Reader\Kml;

use LibKml\Domain\Feature\Feature;
use LibKml\Domain\FieldType\NetworkLinkControl;
use LibKml\Reader\Kml\KmlParser;
use LibKml\Reader\WrongDocumentFormat;
use PHPUnit\Framework\TestCase;

class KmlParserTest extends TestCase {

  const KML = <<<'TAG'
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

  const KML_ERRONEOUS = <<<'TAG'
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

  public function setUp() {
    $this->kmlParser = new KmlParser();
  }

  public function testParse() {
    $kmlDocument = $this->kmlParser->parse(self::KML);

    $this->assertInstanceOf(NetworkLinkControl::class, $kmlDocument->getNetworkLinkControl());
    $this->assertInstanceOf(Feature::class, $kmlDocument->getFeature());
  }

  public function testParseException() {
    $this->expectException(WrongDocumentFormat::class);

    $this->kmlParser->parse(self::KML_ERRONEOUS);
  }

}
