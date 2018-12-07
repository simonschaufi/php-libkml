<?php

namespace LibKml\Reader\Kml\Geometry;

use LibKml\Domain\Geometry\Polygon;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\KmlObjectParser;
use SimpleXMLElement;

class PolygonParser extends KmlObjectParser {

  protected function buildKmlObject(): KmlObject {
    return new Polygon();
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

    if (isset($element->outerBoundaryIs->LinearRing)) {
      $kmlObject->setOuterBoundaryIs(GeometryExtractor::extractGeometry($element->outerBoundaryIs));
    }

    if (isset($element->innerBoundaryIs->LinearRing)) {
      $kmlObject->setInnerBoundaryIs(GeometryExtractor::extractGeometry($element->innerBoundaryIs));
    }
  }

}
