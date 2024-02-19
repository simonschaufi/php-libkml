<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Orientation;

class OrientationParser
{
    public static function parse(\SimpleXMLElement $element): Orientation
    {
        $orientation = new Orientation();

        if (isset($element->heading)) {
            $orientation->setHeading((float)$element->heading);
        }

        if (isset($element->tilt)) {
            $orientation->setTilt((float)$element->tilt);
        }

        if (isset($element->roll)) {
            $orientation->setRoll((float)$element->roll);
        }

        return $orientation;
    }
}
