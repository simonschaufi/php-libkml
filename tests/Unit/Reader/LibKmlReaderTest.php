<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader;

use LibKml\Domain\KmlDocument;
use LibKml\Reader\KmlReader;
use PHPUnit\Framework\TestCase;

final class LibKmlReaderTest extends TestCase
{
    public const KML = '<?xml version="1.0" encoding="utf-8"?>
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
     * @var KmlReader
     */
    protected $libKmlReader;

    protected function setUp(): void
    {
        $this->libKmlReader = new KmlReader();
    }

    public function testFromKml(): void
    {
        $kmlDocument = $this->libKmlReader->fromKml(self::KML);

        self::assertInstanceOf(KmlDocument::class, $kmlDocument);
    }
}
