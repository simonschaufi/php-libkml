<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader;

use LibKml\Domain\KmlDocument;
use LibKml\Reader\KmlReader;
use PHPUnit\Framework\TestCase;

final class LibKmlReaderTest extends TestCase
{
    private const KML = '<?xml version="1.0" encoding="utf-8"?>
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

    private KmlReader $libKmlReader;

    protected function setUp(): void
    {
        $this->libKmlReader = new KmlReader();
    }

    public function testFromKml(): void
    {
        $kmlDocument = $this->libKmlReader->fromString(self::KML);

        self::assertInstanceOf(KmlDocument::class, $kmlDocument);
    }

    public function testFromKmlFile(): void
    {
        $kmlDocument = $this->libKmlReader->fromKmlFile(__DIR__ . '/../../kml/document.kml');

        self::assertInstanceOf(KmlDocument::class, $kmlDocument);
    }
}
