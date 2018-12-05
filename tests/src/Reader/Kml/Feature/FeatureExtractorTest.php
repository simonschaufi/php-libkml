<?php

namespace LibKml\Tests\Reader\Kml\Feature;

use LibKml\Domain\Feature\Placemark;
use LibKml\Reader\Kml\Feature\FeatureExtractor;
use PHPUnit\Framework\TestCase;

class FeatureExtractorTest extends TestCase {

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

  public function testExtractFeature() {
    $kml = simplexml_load_string(self::KML);

    $feature = FeatureExtractor::extractFeature($kml);

    $this->assertInstanceOf(Placemark::class, $feature);
  }

}
