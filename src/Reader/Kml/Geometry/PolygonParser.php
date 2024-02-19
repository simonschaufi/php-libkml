<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\Geometry;

use LibKml\Domain\Geometry\LinearRing;
use LibKml\Domain\Geometry\Polygon;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\KmlObjectParser;

class PolygonParser extends KmlObjectParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new Polygon();
    }

    /**
     * @param KmlObject|Polygon $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->tessellate)) {
            $kmlObject->setTessellate((bool)$element->tessellate);
        }

        if (isset($element->extrude)) {
            $kmlObject->setExtrude((bool)$element->extrude);
        }

        if (isset($element->altitudeMode)) {
            $kmlObject->setAltitudeMode((string)$element->altitudeMode);
        }

        if (isset($element->outerBoundaryIs->LinearRing)) {
            $geometry = GeometryExtractor::extractGeometry($element->outerBoundaryIs);
            if ($geometry instanceof LinearRing) {
                $kmlObject->setOuterBoundaryIs($geometry);
            }
        }

        if (isset($element->innerBoundaryIs->LinearRing)) {
            $geometry = GeometryExtractor::extractGeometry($element->innerBoundaryIs);
            if ($geometry instanceof LinearRing) {
                $kmlObject->setInnerBoundaryIs($geometry);
            }
        }
    }
}
