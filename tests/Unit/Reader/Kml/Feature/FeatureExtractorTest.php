<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Feature;

use LibKml\Domain\Feature\Placemark;
use LibKml\Reader\Kml\Feature\FeatureExtractor;
use PHPUnit\Framework\TestCase;

final class FeatureExtractorTest extends TestCase
{
    private const KML_FEATURE = <<<'TAG'
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

    private const KML_NO_FEATURE = <<<'TAG'
<?xml version="1.0" encoding="utf-8"?>
<kml xmlns="http://www.opengis.net/kml/2.2">
  <NetworkLinkControl>
    <maxSessionLength>4</maxSessionLength>
  </NetworkLinkControl>
</kml>
TAG;

    public function testExtractFeature(): void
    {
        $kml = simplexml_load_string(self::KML_FEATURE);

        $feature = FeatureExtractor::extractFeature($kml);

        self::assertInstanceOf(Placemark::class, $feature);
    }

    public function testExtractFeatureNone(): void
    {
        $kml = simplexml_load_string(self::KML_NO_FEATURE);

        $feature = FeatureExtractor::extractFeature($kml);

        self::assertNull($feature);
    }
}
