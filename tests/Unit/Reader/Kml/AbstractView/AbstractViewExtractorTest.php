<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\AbstractView;

use LibKml\Domain\AbstractView\Camera;
use LibKml\Domain\AbstractView\LookAt;
use LibKml\Reader\Kml\AbstractView\AbstractViewExtractor;
use PHPUnit\Framework\TestCase;

final class AbstractViewExtractorTest extends TestCase
{
    public const KML_CAMERA = <<<'TAG'
<Placemark id="placemark-1" targetId="target-1">
  <name>My office</name>
  <Camera>
    <longitude>170.157</longitude>
    <latitude>-43.671</latitude>
    <altitude>9700</altitude>
    <heading>-6.333</heading>
    <tilt>33.5</tilt>
    <roll>12.5</roll>
  </Camera>
  <styleUrl>#myIconStyle</styleUrl>
  <Point>
    <coordinates>-122.087461,37.422069</coordinates>
  </Point>
</Placemark>
TAG;

    public const KML_LOOK_AT = <<<'TAG'
<Placemark id="placemark-1" targetId="target-1">
  <name>My office</name>
  <LookAt>
    <longitude>-119.748584</longitude>
    <latitude>33.736266</latitude>
    <altitude>90</altitude>
    <heading>-9.295926</heading>
    <tilt>84.0957450</tilt>
    <range>4469.850414</range>
  </LookAt>
  <styleUrl>#myIconStyle</styleUrl>
  <Point>
    <coordinates>-122.087461,37.422069</coordinates>
  </Point>
</Placemark>
TAG;

    public function testExtractCamera(): void
    {
        $kml = simplexml_load_string(self::KML_CAMERA);

        $view = AbstractViewExtractor::extract($kml);

        self::assertInstanceOf(Camera::class, $view);
    }

    public function testExtractLookAt(): void
    {
        $kml = simplexml_load_string(self::KML_LOOK_AT);

        $view = AbstractViewExtractor::extract($kml);

        self::assertInstanceOf(LookAt::class, $view);
    }
}
