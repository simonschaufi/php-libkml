<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\AbstractView;

use LibKml\Domain\AbstractView\AbstractView;
use LibKml\Domain\AbstractView\View;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\KmlObjectParser;
use LibKml\Reader\Kml\TimePrimitive\TimePrimitiveExtractor;

abstract class AbstractViewParser extends KmlObjectParser
{
    /**
     * @param KmlObject|View|AbstractView $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->longitude)) {
            $kmlObject->setLongitude((float)$element->longitude);
        }

        if (isset($element->latitude)) {
            $kmlObject->setLatitude((float)$element->latitude);
        }

        if (isset($element->altitude)) {
            $kmlObject->setAltitude((float)$element->altitude);
        }

        if (isset($element->heading)) {
            $kmlObject->setHeading((float)$element->heading);
        }

        if (isset($element->tilt)) {
            $kmlObject->setTilt((float)$element->tilt);
        }

        if (isset($element->altitudeMode)) {
            $kmlObject->setAltitudeMode((string)$element->altitudeMode);
        }

        $timePrimitive = TimePrimitiveExtractor::extract($element);
        if (isset($timePrimitive)) {
            $kmlObject->setTimePrimitive($timePrimitive);
        }
    }
}
