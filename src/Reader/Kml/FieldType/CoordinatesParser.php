<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Coordinates;

/**
 * Parses KML coordinates values
 */
class CoordinatesParser
{
    public static function parseCoordinates(?string $kmlValue): ?Coordinates
    {
        $coordinates = null;

        if ($kmlValue !== null) {
            $coordinates = self::parseCoordinatesStringElement($kmlValue);
        }

        return $coordinates;
    }

    public static function parseCoordinatesStringElement(?string $kmlValue): Coordinates
    {
        $coordinates = null;

        $coordinatesArray = explode(',', $kmlValue);

        if (count($coordinatesArray) > 0) {
            $coordinates = new Coordinates();
            $coordinates->setLongitude((float)$coordinatesArray[0]);

            if (isset($coordinatesArray[1])) {
                $coordinates->setLatitude((float)$coordinatesArray[1]);
            }

            if (isset($coordinatesArray[2])) {
                $coordinates->setAltitude((float)$coordinatesArray[2]);
            }
        }

        return $coordinates;
    }

    public static function parseCoordinatesList(?string $kmlValue): array
    {
        $coordinatesList = [];

        $segments = preg_split('/\s+/', (string)$kmlValue);
        foreach ($segments as $segment) {
            if (!empty($segment)) {
                $coordinatesList[] = self::parseCoordinatesStringElement($segment);
            }
        }

        return $coordinatesList;
    }
}
