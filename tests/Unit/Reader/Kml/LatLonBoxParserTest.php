<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml;

use LibKml\Reader\Kml\LatLonBoxParser;
use PHPUnit\Framework\TestCase;

final class LatLonBoxParserTest extends TestCase
{
    public const KML_GROUND_OVERLAY = <<< 'TAG'
<LatLonBox>
  <north>37.83234</north>
  <south>37.832122</south>
  <east>-122.373033</east>
  <west>-122.373724</west>
  <rotation>45</rotation>
</LatLonBox>
TAG;

    public function testParse(): void
    {
        $kml = simplexml_load_string(self::KML_GROUND_OVERLAY);

        $latLonBox = LatLonBoxParser::parse($kml);

        self::assertEquals(37.83234, $latLonBox->getNorth());
        self::assertEquals(37.832122, $latLonBox->getSouth());
        self::assertEquals(-122.373033, $latLonBox->getEast());
        self::assertEquals(-122.373724, $latLonBox->getWest());
        self::assertEquals(45, $latLonBox->getRotation());
    }
}
