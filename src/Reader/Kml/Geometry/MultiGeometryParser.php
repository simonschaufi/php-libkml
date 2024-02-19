<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\Geometry;

use LibKml\Domain\Geometry\MultiGeometry;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\KmlObjectParser;

class MultiGeometryParser extends KmlObjectParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new MultiGeometry();
    }

    /**
     * @param KmlObject|MultiGeometry $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        $kmlObject->setGeometries(GeometryExtractor::extractGeometries($element));
    }
}
