<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\Geometry\Point;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\FieldType\CoordinatesParser;
use LibKml\Reader\Kml\KmlObjectParser;

class PointParser extends KmlObjectParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new Point();
    }

    /**
     * @param KmlObject|Point $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->extrude)) {
            $kmlObject->setExtrude((bool)$element->extrude);
        }

        if (isset($element->coordinates)) {
            $coordinates = CoordinatesParser::parseCoordinates((string)$element->coordinates);
            if ($coordinates instanceof Coordinates) {
                $kmlObject->setCoordinates($coordinates);
            }
        }
    }
}
