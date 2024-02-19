<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\TimePrimitive;

use LibKml\Domain\KmlObject;
use LibKml\Domain\TimePrimitive\TimeSpan;
use LibKml\Reader\Kml\KmlObjectParser;

class TimeSpanParser extends KmlObjectParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new TimeSpan();
    }

    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        if (isset($element->begin)) {
            $kmlObject->setBegin(trim((string)$element->begin));
        }

        if (isset($element->end)) {
            $kmlObject->setEnd(trim((string)$element->end));
        }
    }
}
