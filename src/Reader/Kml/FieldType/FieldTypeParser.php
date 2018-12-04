<?php

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Coordinates;

class FieldTypeParser {

  public static function parseCoordinates(?string $kmlValue): ?Coordinates {
    $coordinates = NULL;

    if ($kmlValue !== NULL) {
      $coordinateElements = explode(",", $kmlValue);

      if (count($coordinateElements) > 0) {
        $coordinates = new Coordinates();
        $coordinates->setLongitude(floatval($coordinateElements[0]));

        if (isset($coordinateElements[1])) {
          $coordinates->setLatitude(floatval($coordinateElements[1]));
        }

        if (isset($coordinateElements[2])) {
          $coordinates->setAltitude(floatval($coordinateElements[2]));
        }
      }
    }

    return $coordinates;
  }

}
