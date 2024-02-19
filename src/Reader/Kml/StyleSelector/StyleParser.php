<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\StyleSelector;

use LibKml\Domain\KmlObject;
use LibKml\Domain\StyleSelector\Style;
use LibKml\Reader\Kml\KmlElementParserFactory;
use LibKml\Reader\Kml\KmlObjectParser;

/**
 * Parses Style kml element.
 */
class StyleParser extends KmlObjectParser
{
    public const SUB_STYLES = [
        'BalloonStyle',
        'IconStyle',
        'LabelStyle',
        'LineStyle',
        'ListStyle',
        'PolyStyle',
    ];

    protected function buildKmlObject(): KmlObject
    {
        return new Style();
    }

    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        $kmlElementParserFactory = KmlElementParserFactory::getInstance();

        foreach (self::SUB_STYLES as $subStyleName) {
            if (isset($element->{$subStyleName})) {
                $parser = $kmlElementParserFactory->getParserByElementName($subStyleName);
                $subStyle = $parser->parse($element->{$subStyleName});
                $kmlObject->{'set' . $subStyleName}($subStyle);
            }
        }
    }
}
