<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\Geometry;

use LibKml\Domain\Geometry\LineString;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\FieldType\CoordinatesParser;
use LibKml\Reader\Kml\KmlObjectParser;

class LineStringParser extends KmlObjectParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new LineString();
    }

    /**
     * @param KmlObject|LineString $kmlObject
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

        if (isset($element->coordinates)) {
            $coordinates = CoordinatesParser::parseCoordinatesList((string)$element->coordinates);
            $kmlObject->setCoordinates($coordinates);
        }
    }
}
