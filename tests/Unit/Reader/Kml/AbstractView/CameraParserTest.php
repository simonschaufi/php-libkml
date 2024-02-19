<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\AbstractView;

use LibKml\Reader\Kml\AbstractView\CameraParser;
use PHPUnit\Framework\TestCase;

final class CameraParserTest extends TestCase
{
    public const KML_CAMERA = <<<'TAG'
<Camera>
  <longitude>170.157</longitude>
  <latitude>-43.671</latitude>
  <altitude>9700</altitude>
  <heading>-6.333</heading>
  <tilt>33.5</tilt>
  <roll>12.5</roll>
</Camera>
TAG;

    protected $cameraParser;

    protected function setUp(): void
    {
        $this->cameraParser = new CameraParser();
    }

    public function testParse(): void
    {
        $xmlElement = simplexml_load_string(self::KML_CAMERA);

        $camera = $this->cameraParser->parse($xmlElement);

        self::assertEquals(170.157, $camera->getLongitude());
        self::assertEquals(-43.671, $camera->getLatitude());
        self::assertEquals(9700, $camera->getAltitude());
        self::assertEquals(-6.333, $camera->getHeading());
        self::assertEquals(33.5, $camera->getTilt());
        self::assertEquals(12.5, $camera->getRoll());
    }
}
