<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\ColorStyle\LineStyle;

class LineStyleParser extends ColorStyleParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new LineStyle();
    }

    /**
     * @param KmlObject|LineStyle $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->width)) {
            $kmlObject->setWidth((float)$element->width);
        }
    }
}
