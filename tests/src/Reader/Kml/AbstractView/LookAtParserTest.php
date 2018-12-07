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

  public function setUp() {
    $this->lookAtParser = new LookAtParser();
  }

  public function testParse() {
    $xmlElement = simplexml_load_string(self::KML_LOOK_AT);

    $lookAt = $this->lookAtParser->parse($xmlElement);

    $this->assertEquals(-119.748584, $lookAt->getLongitude());
    $this->assertEquals(33.736266, $lookAt->getLatitude());
    $this->assertEquals(90, $lookAt->getAltitude());
    $this->assertEquals(-9.295926, $lookAt->getHeading());
    $this->assertEquals(84.0957450, $lookAt->getTilt());
    $this->assertEquals(4469.850414, $lookAt->getRange());
  }

}
