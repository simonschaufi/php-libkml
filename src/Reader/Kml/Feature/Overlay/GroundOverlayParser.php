<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\GroundOverlay;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\LatLonBoxParser;

class GroundOverlayParser extends OverlayParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new GroundOverlay();
    }

    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->altitude)) {
            $kmlObject->setAltitude((float)$element->altitude);
        }

        if (isset($element->altitudeMode)) {
            $kmlObject->setAltitudeMode((string)$element->altitudeMode);
        }

        if (isset($element->LatLonBox)) {
            $kmlObject->setLatLonBox(LatLonBoxParser::parse($element->LatLonBox));
        }
    }
}
