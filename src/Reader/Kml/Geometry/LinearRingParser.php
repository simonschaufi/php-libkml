<?php

namespace LibKml\Reader\Kml\Geometry;

use LibKml\Domain\Geometry\LinearRing;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\FieldType\CoordinatesParser;
use LibKml\Reader\Kml\KmlObjectParser;
use SimpleXMLElement;

class LinearRingParser extends KmlObjectParser {

  protected function buildKmlObject(): KmlObject {
    return new LinearRing();
  }

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->tessellate)) {
      $kmlObject->setTessellate((bool) $element->tessellate);
    }

    if (isset($element->extrude)) {
      $kmlObject->setExtrude((bool) $element->extrude);
    }

    if (isset($element->altitudeMode)) {
      $kmlObject->setAltitudeMode($element->altitudeMode);
    }

    if (isset($element->coordinates)) {
      $coordinates = CoordinatesParser::parseCoordinatesList($element->coordinates);
      $kmlObject->setCoordinates($coordinates);
    }
  }

}