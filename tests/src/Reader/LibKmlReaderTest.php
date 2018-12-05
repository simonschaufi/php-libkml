<?php

namespace LibKml\Tests\Reader;

use LibKml\Domain\KmlDocument;
use LibKml\Reader\LibKmlReader;
use PHPUnit\Framework\TestCase;

class LibKmlReaderTest extends TestCase {

  const KML = '<?xml version="1.0" encoding="utf-8"?>
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
</kml>';

  /**
   * @var LibKmlReader
   */
  protected $libKmlReader;

  public function setUp() {
    $this->libKmlReader = new LibKmlReader();
  }

  public function testFromKml() {
    $kmlDocument = $this->libKmlReader->fromKml(self::KML);

    $this->assertInstanceOf(KmlDocument::class, $kmlDocument);
  }

}
