<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\ColorStyle\LabelStyle;

class LabelStyleParser extends ColorStyleParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new LabelStyle();
    }

    /**
     * @param KmlObject|LabelStyle $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->scale)) {
            $kmlObject->setScale((float)$element->scale);
        }
    }
}
