<?php

namespace LibKml\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\Geometry\Point;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\FieldType\CoordinatesParser;
use LibKml\Reader\Kml\KmlObjectParser;
use SimpleXMLElement;

class PointParser extends KmlObjectParser {

  protected function buildKmlObject(): KmlObject {
    return new Point();
  }

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->extrude)) {
      $kmlObject->setExtrude((bool) $element->extrude);
    }

    if (isset($element->coordinates)) {
      $coordinates = CoordinatesParser::parseCoordinates($element->coordinates);
      $kmlObject->setCoordinates($coordinates);
    }
  }

}
