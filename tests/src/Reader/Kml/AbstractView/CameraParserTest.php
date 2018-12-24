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
  protected $camera;

  public function setUp() {
    $this->cameraParser = new CameraParser();

    $xmlElement = simplexml_load_string(self::KML_CAMERA);

    $this->camera = $this->cameraParser->parse($xmlElement);
  }

  public function testParseLongitude() {
    $this->assertEquals(170.157, $this->camera->getLongitude());
  }

  public function testParseLatitude() {
    $this->assertEquals(-43.671, $this->camera->getLatitude());
  }

  public function testParseAltitude() {
    $this->assertEquals(9700, $this->camera->getAltitude());
  }

  public function testParseHeading() {
    $this->assertEquals(-6.333, $this->camera->getHeading());
  }

  public function testParseTilt() {
    $this->assertEquals(33.5, $this->camera->getTilt());
  }

  public function testParseRoll() {
    $this->assertEquals(12.5, $this->camera->getRoll());
  }
}
