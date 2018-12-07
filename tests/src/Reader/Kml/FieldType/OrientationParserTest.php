<?php

namespace LibKml\Tests\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Orientation;
use LibKml\Reader\Kml\FieldType\OrientationParser;
use PHPUnit\Framework\TestCase;

class OrientationParserTest extends TestCase {

  const KML_ORIENTATION = <<<'TAG'
<Orientation> 
  <heading>45.8</heading> 
  <tilt>10.1</tilt> 
  <roll>3.75</roll> 
</Orientation> 
TAG;


  function testParse() {
    $element = simplexml_load_string(self::KML_ORIENTATION);

    $orientation = OrientationParser::parse($element);

    $this->assertInstanceOf(Orientation::class, $orientation);
    $this->assertEquals(45.8, $orientation->getHeading());
    $this->assertEquals(10.1, $orientation->getTilt());
    $this->assertEquals(3.75, $orientation->getRoll());
  }
}
