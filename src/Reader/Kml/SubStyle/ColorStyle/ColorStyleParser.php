<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\ColorStyle\ColorStyle;
use LibKml\Reader\Kml\FieldType\ColorParser;
use LibKml\Reader\Kml\KmlObjectParser;

/**
 * Parses ColorStyle KML entities
 */
abstract class ColorStyleParser extends KmlObjectParser
{
    /**
     * @param KmlObject|ColorStyle $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->color)) {
            $color = ColorParser::parse((string)$element->color);
            if ($color instanceof Color) {
                $kmlObject->setColor($color);
            }
        }

        if (isset($element->colorMode)) {
            $kmlObject->setColorMode((string)$element->colorMode);
        }
    }
}
