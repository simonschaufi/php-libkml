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
  
  protected $latLonBox;
  
  public function setUp() {
    $kml = simplexml_load_string(self::KML_GROUND_OVERLAY);

    $this->latLonBox = LatLonBoxParser::parse($kml);
  }

  public function testParseNorth() {
    $this->assertEquals(37.83234, $this->latLonBox->getNorth());
  }

  public function testParseSouth() {
    $this->assertEquals(37.832122, $this->latLonBox->getSouth());
  }

  public function testParseEast() {
    $this->assertEquals(-122.373033, $this->latLonBox->getEast());
  }

  public function testParseWest() {
    $this->assertEquals(-122.373724, $this->latLonBox->getWest());
  }

  public function testParseRotation() {
    $this->assertEquals(45, $this->latLonBox->getRotation());
  }

}
