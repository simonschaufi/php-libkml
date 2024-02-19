<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\TimePrimitive;

use LibKml\Domain\KmlObject;
use LibKml\Domain\TimePrimitive\TimeStamp;
use LibKml\Reader\Kml\KmlObjectParser;

class TimeStampParser extends KmlObjectParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new TimeStamp();
    }

    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        if (isset($element->when)) {
            $kmlObject->setWhen((string)$element->when);
        }
    }
}
