<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\SubStyle;

use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\BalloonStyle;
use LibKml\Reader\Kml\FieldType\ColorParser;
use LibKml\Reader\Kml\KmlObjectParser;

class BalloonStyleParser extends KmlObjectParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new BalloonStyle();
    }

    /**
     * @param KmlObject|BalloonStyle $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->bgColor)) {
            $kmlObject->setBgColor(ColorParser::parse((string)$element->bgColor));
        }

        if (isset($element->textColor)) {
            $kmlObject->setTextColor(ColorParser::parse((string)$element->textColor));
        }

        if (isset($element->text)) {
            $kmlObject->setText((string)$element->text);
        }

        if (isset($element->displayMode)) {
            $kmlObject->setDisplayMode((string)$element->displayMode);
        }
    }
}
