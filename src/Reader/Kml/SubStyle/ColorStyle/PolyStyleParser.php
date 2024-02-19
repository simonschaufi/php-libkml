<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\ColorStyle\PolyStyle;

class PolyStyleParser extends ColorStyleParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new PolyStyle();
    }

    /**
     * @param KmlObject|PolyStyle $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->fill)) {
            $kmlObject->setFill(filter_var($element->fill, FILTER_VALIDATE_BOOLEAN));
        }

        if (isset($element->outline)) {
            $kmlObject->setOutline(filter_var($element->outline, FILTER_VALIDATE_BOOLEAN));
        }
    }
}
