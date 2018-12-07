<?php

namespace LibKml\Tests\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Reader\Kml\FieldType\CoordinatesParser;
use PHPUnit\Framework\TestCase;

class CoordinatesParserTest extends TestCase {

  public function testParseCoordinates2D() {
    $coordinates = CoordinatesParser::parseCoordinates("-122.087461,37.422069");

    $this->assertEquals(-122.087461, $coordinates->getLongitude());
    $this->assertEquals(37.422069, $coordinates->getLatitude());
  }

  public function testParseCoordinates3D() {
    $coordinates = CoordinatesParser::parseCoordinates("-122.087461,37.422069,11.5");

    $this->assertEquals(-122.087461, $coordinates->getLongitude());
    $this->assertEquals(37.422069, $coordinates->getLatitude());
    $this->assertEquals(11.5, $coordinates->getAltitude());
  }

  public function testParseCoordinatesList2D() {
    $coordinatesList = CoordinatesParser::parseCoordinatesList(<<<TAG
      -122.365662,37.826988
      -122.365202,37.826302
      -122.364581,37.82655
      -122.365038,37.827237
      -122.365662,37.826988
TAG
    );
    $this->assertCount(5, $coordinatesList);
    $this->assertTrue(in_array(Coordinates::fromLonLat(-122.365662, 37.826988), $coordinatesList));
    $this->assertTrue(in_array(Coordinates::fromLonLat(-122.365202, 37.826302), $coordinatesList));
    $this->assertTrue(in_array(Coordinates::fromLonLat(-122.364581, 37.82655), $coordinatesList));
    $this->assertTrue(in_array(Coordinates::fromLonLat(-122.365038, 37.827237), $coordinatesList));
    $this->assertTrue(in_array(Coordinates::fromLonLat(-122.365662, 37.826988), $coordinatesList));
  }

  public function testParseCoordinatesList3D() {
    $coordinatesList = CoordinatesParser::parseCoordinatesList(<<<TAG
      -122.365662,37.826988,11.5
      -122.365202,37.826302,10.1
      -122.364581,37.82655,5.0
      -122.365038,37.827237,7.02
      -122.365662,37.826988,12.78
TAG
    );

    $this->assertCount(5, $coordinatesList);
    $this->assertTrue(in_array(Coordinates::fromLonLatAlt(-122.365662, 37.826988, 11.5), $coordinatesList));
    $this->assertTrue(in_array(Coordinates::fromLonLatAlt(-122.365202, 37.826302, 10.1), $coordinatesList));
    $this->assertTrue(in_array(Coordinates::fromLonLatAlt(-122.364581, 37.82655, 5.0), $coordinatesList));
    $this->assertTrue(in_array(Coordinates::fromLonLatAlt(-122.365038, 37.827237, 7.02), $coordinatesList));
    $this->assertTrue(in_array(Coordinates::fromLonLatAlt(-122.365662, 37.826988, 12.78), $coordinatesList));
  }

  public function testParseCoordinatesListNull() {
    $coordinates = CoordinatesParser::parseCoordinatesList(NULL);

    $this->assertEmpty($coordinates);
  }

  public function testParseCoordinatesNull() {
    $coordinates = CoordinatesParser::parseCoordinates(NULL);

    $this->assertNull($coordinates);
  }

}
