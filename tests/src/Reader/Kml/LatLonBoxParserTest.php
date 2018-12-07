<?php

namespace LibKml\Tests\Reader\Kml;

use LibKml\Reader\Kml\LatLonBoxParser;
use PHPUnit\Framework\TestCase;

class LatLonBoxParserTest extends TestCase {

  const KML_GROUND_OVERLAY = <<< 'TAG'
<LatLonBox>
  <north>37.83234</north>
  <south>37.832122</south>
  <east>-122.373033</east>
  <west>-122.373724</west>
  <rotation>45</rotation>
</LatLonBox>
TAG;

  public function testParse() {
    $kml = simplexml_load_string(self::KML_GROUND_OVERLAY);

    $latLonBox = LatLonBoxParser::parse($kml);

    $this->assertEquals(37.83234, $latLonBox->getNorth());
    $this->assertEquals(37.832122, $latLonBox->getSouth());
    $this->assertEquals(-122.373033, $latLonBox->getEast());
    $this->assertEquals(-122.373724, $latLonBox->getWest());
    $this->assertEquals(45, $latLonBox->getRotation());
  }

}
