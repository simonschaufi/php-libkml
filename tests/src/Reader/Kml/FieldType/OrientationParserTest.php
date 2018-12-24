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

  protected $orientation;
  
  public function setUp() {
    $element = simplexml_load_string(self::KML_ORIENTATION);

    $this->orientation = OrientationParser::parse($element);
  }

  public function testParseOrientation() {
    $this->assertInstanceOf(Orientation::class, $this->orientation);
  }

  public function testParseHeading() {
    $this->assertEquals(45.8, $this->orientation->getHeading());
  }

  public function testParseTilt() {
    $this->assertEquals(10.1, $this->orientation->getTilt());
  }

  public function testParseRoll() {
    $this->assertEquals(3.75, $this->orientation->getRoll());
  }
}
