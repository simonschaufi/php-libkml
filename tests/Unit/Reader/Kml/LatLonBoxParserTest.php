<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml;

use LibKml\Domain\LatLonBox;
use LibKml\Reader\Kml\LatLonBoxParser;
use PHPUnit\Framework\TestCase;

final class LatLonBoxParserTest extends TestCase
{
    private const KML_GROUND_OVERLAY = <<< 'TAG'
<LatLonBox>
  <north>37.83234</north>
  <south>37.832122</south>
  <east>-122.373033</east>
  <west>-122.373724</west>
  <rotation>45</rotation>
</LatLonBox>
TAG;

    private LatLonBox $latLonBox;

    protected function setUp(): void
    {
        $kml = simplexml_load_string(self::KML_GROUND_OVERLAY);

        $this->latLonBox = LatLonBoxParser::parse($kml);
    }

    public function testParseNorth(): void
    {
        self::assertEquals(37.83234, $this->latLonBox->getNorth());
    }

    public function testParseSouth(): void
    {
        self::assertEquals(37.832122, $this->latLonBox->getSouth());
    }

    public function testParseEast(): void
    {
        self::assertEquals(-122.373033, $this->latLonBox->getEast());
    }

    public function testParseWest(): void
    {
        self::assertEquals(-122.373724, $this->latLonBox->getWest());
    }

    public function testParseRotation(): void
    {
        self::assertEquals(45, $this->latLonBox->getRotation());
    }
}
