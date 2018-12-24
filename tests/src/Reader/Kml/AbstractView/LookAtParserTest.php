<?php

namespace LibKml\Tests\Reader\Kml\AbstractView;

use LibKml\Domain\AbstractView\LookAt;
use LibKml\Reader\Kml\AbstractView\LookAtParser;
use PHPUnit\Framework\TestCase;

class LookAtParserTest extends TestCase {

  const KML_LOOK_AT = <<<'TAG'
<LookAt>
  <longitude>-119.748584</longitude>
  <latitude>33.736266</latitude>
  <altitude>90</altitude>
  <heading>-9.295926</heading>
  <tilt>84.0957450</tilt>
  <range>4469.850414</range>
</LookAt>
TAG;

  /**
   * @var LookAtParser
   */
  protected $lookAtParser;

  /**
   * @var LookAt
   */
  protected $lookAt;

  public function setUp() {
    $this->lookAtParser = new LookAtParser();

    $xmlElement = simplexml_load_string(self::KML_LOOK_AT);

    $this->lookAt = $this->lookAtParser->parse($xmlElement);
  }

  public function testParseLongitude() {
    $this->assertEquals(-119.748584, $this->lookAt->getLongitude());
  }

  public function testParseLatitude() {
    $this->assertEquals(33.736266, $this->lookAt->getLatitude());
  }

  public function testParseAltitude() {
    $this->assertEquals(90, $this->lookAt->getAltitude());
  }

  public function testParseHeading() {
    $this->assertEquals(-9.295926, $this->lookAt->getHeading());
  }

  public function testParseTilt() {
    $this->assertEquals(84.0957450, $this->lookAt->getTilt());
  }

  public function testParseRange() {
    $this->assertEquals(4469.850414, $this->lookAt->getRange());
  }

}
