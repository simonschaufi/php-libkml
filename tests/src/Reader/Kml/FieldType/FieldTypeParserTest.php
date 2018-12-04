<?php

namespace LibKml\Tests\Reader\Kml\FieldType;

use LibKml\Reader\Kml\FieldType\FieldTypeParser;
use PHPUnit\Framework\TestCase;

class FieldTypeParserTest extends TestCase {

  public function testParseCoordinates2D() {
    $coordinates = FieldTypeParser::parseCoordinates("-122.087461,37.422069");

    $this->assertEquals(-122.087461, $coordinates->getLongitude());
    $this->assertEquals(37.422069, $coordinates->getLatitude());
  }

  public function testParseCoordinates3D() {
    $coordinates = FieldTypeParser::parseCoordinates("-122.087461,37.422069,11.5");

    $this->assertEquals(-122.087461, $coordinates->getLongitude());
    $this->assertEquals(37.422069, $coordinates->getLatitude());
    $this->assertEquals(11.5, $coordinates->getAltitude());
  }

  public function testParseCoordinatesNull() {
    $coordinates = FieldTypeParser::parseCoordinates(NULL);

    $this->assertNull($coordinates);
  }

}
