<?php

namespace LibKml\Tests\Reader\Kml\AbstractView;

use LibKml\Reader\Kml\AbstractView\CameraParser;
use PHPUnit\Framework\TestCase;

class CameraParserTest extends TestCase {

  const KML_CAMERA = <<<'TAG'
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

  public function setUp() {
    $this->cameraParser = new CameraParser();
  }

  public function testParse() {
    $xmlElement = simplexml_load_string(self::KML_CAMERA);

    $camera = $this->cameraParser->parse($xmlElement);

    $this->assertEquals(170.157, $camera->getLongitude());
    $this->assertEquals(-43.671, $camera->getLatitude());
    $this->assertEquals(9700, $camera->getAltitude());
    $this->assertEquals(-6.333, $camera->getHeading());
    $this->assertEquals(33.5, $camera->getTilt());
    $this->assertEquals(12.5, $camera->getRoll());
  }
}
