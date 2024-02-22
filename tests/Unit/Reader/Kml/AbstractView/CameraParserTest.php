<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\AbstractView;

use LibKml\Domain\AbstractView\Camera;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\AbstractView\CameraParser;
use PHPUnit\Framework\TestCase;

final class CameraParserTest extends TestCase
{
    private const KML_CAMERA = <<<'TAG'
<Camera>
  <longitude>170.157</longitude>
  <latitude>-43.671</latitude>
  <altitude>9700</altitude>
  <heading>-6.333</heading>
  <tilt>33.5</tilt>
  <roll>12.5</roll>
  <TimeSpan>
    <begin>1876-08-01</begin>
  </TimeSpan>
</Camera>
TAG;

    /**
     * @var Camera
     */
    private KmlObject $camera;

    protected function setUp(): void
    {
        $cameraParser = new CameraParser();

        $this->camera = $cameraParser->parse(simplexml_load_string(self::KML_CAMERA));
    }

    public function testParseLongitude(): void
    {
        self::assertEquals(170.157, $this->camera->getLongitude());
    }

    public function testParseLatitude(): void
    {
        self::assertEquals(-43.671, $this->camera->getLatitude());
    }

    public function testParseAltitude(): void
    {
        self::assertEquals(9700, $this->camera->getAltitude());
    }

    public function testParseHeading(): void
    {
        self::assertEquals(-6.333, $this->camera->getHeading());
    }

    public function testParseTilt(): void
    {
        self::assertEquals(33.5, $this->camera->getTilt());
    }

    public function testParseRoll(): void
    {
        self::assertEquals(12.5, $this->camera->getRoll());
    }
}
