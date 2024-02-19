<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\SubStyle;

use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\ListStyle;
use LibKml\Reader\Kml\FieldType\ColorParser;
use LibKml\Reader\Kml\KmlObjectParser;

class ListStyleParser extends KmlObjectParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new ListStyle();
    }

    /**
     * @param KmlObject|ListStyle $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->listItemType)) {
            $kmlObject->setListItemType((string)$element->listItemType);
        }

        if (isset($element->bgColor)) {
            $kmlObject->setBgColor(ColorParser::parse((string)$element->bgColor));
        }
    }
}
