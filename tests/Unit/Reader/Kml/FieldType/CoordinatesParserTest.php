<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Reader\Kml\FieldType\CoordinatesParser;
use PHPUnit\Framework\TestCase;

final class CoordinatesParserTest extends TestCase
{
    public function testParseCoordinates2D(): void
    {
        $coordinates = CoordinatesParser::parseCoordinates('-122.087461,37.422069');

        self::assertEquals(-122.087461, $coordinates->getLongitude());
        self::assertEquals(37.422069, $coordinates->getLatitude());
    }

    public function testParseCoordinates3D(): void
    {
        $coordinates = CoordinatesParser::parseCoordinates('-122.087461,37.422069,11.5');

        self::assertEquals(-122.087461, $coordinates->getLongitude());
        self::assertEquals(37.422069, $coordinates->getLatitude());
        self::assertEquals(11.5, $coordinates->getAltitude());
    }

    public function testParseCoordinatesList2D(): void
    {
        $coordinatesList = CoordinatesParser::parseCoordinatesList(
            <<<TAG
      -122.365662,37.826988
      -122.365202,37.826302
      -122.364581,37.82655
      -122.365038,37.827237
      -122.365662,37.826988
TAG
        );
        self::assertCount(5, $coordinatesList);
        self::assertTrue(in_array(Coordinates::fromLonLat(-122.365662, 37.826988), $coordinatesList));
        self::assertTrue(in_array(Coordinates::fromLonLat(-122.365202, 37.826302), $coordinatesList));
        self::assertTrue(in_array(Coordinates::fromLonLat(-122.364581, 37.82655), $coordinatesList));
        self::assertTrue(in_array(Coordinates::fromLonLat(-122.365038, 37.827237), $coordinatesList));
        self::assertTrue(in_array(Coordinates::fromLonLat(-122.365662, 37.826988), $coordinatesList));
    }

    public function testParseCoordinatesList3D(): void
    {
        $coordinatesList = CoordinatesParser::parseCoordinatesList(
            <<<TAG
      -122.365662,37.826988,11.5
      -122.365202,37.826302,10.1
      -122.364581,37.82655,5.0
      -122.365038,37.827237,7.02
      -122.365662,37.826988,12.78
TAG
        );

        self::assertCount(5, $coordinatesList);
        self::assertTrue(in_array(Coordinates::fromLonLatAlt(-122.365662, 37.826988, 11.5), $coordinatesList));
        self::assertTrue(in_array(Coordinates::fromLonLatAlt(-122.365202, 37.826302, 10.1), $coordinatesList));
        self::assertTrue(in_array(Coordinates::fromLonLatAlt(-122.364581, 37.82655, 5.0), $coordinatesList));
        self::assertTrue(in_array(Coordinates::fromLonLatAlt(-122.365038, 37.827237, 7.02), $coordinatesList));
        self::assertTrue(in_array(Coordinates::fromLonLatAlt(-122.365662, 37.826988, 12.78), $coordinatesList));
    }

    public function testParseCoordinatesListNull(): void
    {
        $coordinates = CoordinatesParser::parseCoordinatesList(null);

        self::assertEmpty($coordinates);
    }

    public function testParseCoordinatesNull(): void
    {
        $coordinates = CoordinatesParser::parseCoordinates(null);

        self::assertNull($coordinates);
    }
}
