<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\Icon;
use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\ColorStyle\IconStyle;
use LibKml\Reader\Kml\FieldType\Vec2Parser;
use LibKml\Reader\Kml\KmlElementParserFactory;
use LibKml\Reader\Kml\KmlElementParserInterface;

class IconStyleParser extends ColorStyleParser
{
    private KmlElementParserInterface $iconParser;

    public function __construct()
    {
        $this->iconParser = KmlElementParserFactory::getInstance()->getParserByElementName(KmlElementParserFactory::ICON);
    }

    protected function buildKmlObject(): KmlObject
    {
        return new IconStyle();
    }

    /**
     * @param KmlObject|IconStyle $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->scale)) {
            $kmlObject->setScale((float)$element->scale);
        }

        if (isset($element->heading)) {
            $kmlObject->setHeading((float)$element->heading);
        }

        if (isset($element->hotSpot)) {
            $kmlObject->setHotSpot(Vec2Parser::parse($element->hotSpot));
        }

        if (isset($element->Icon)) {
            $icon = $this->iconParser->parse($element->Icon);
            if ($icon instanceof Icon) {
                $kmlObject->setIcon($icon);
            }
        }
    }
}
