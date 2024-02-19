<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\StyleSelector;

use LibKml\Domain\StyleSelector\StyleSelector;
use LibKml\Reader\Kml\KmlElementParserFactory;

class StyleSelectorExtractor
{
    private static array $styleSelectorNames = [
        'Style',
        'StyleMap',
    ];

    public static function extractStyleSelector(\SimpleXMLElement $element): ?StyleSelector
    {
        $kmlElementParserFactory = KmlElementParserFactory::getInstance();

        foreach (self::$styleSelectorNames as $styleSelectorName) {
            if (isset($element->{$styleSelectorName})) {
                $parser = $kmlElementParserFactory->getParserByElementName($styleSelectorName);
                return $parser->parse($element->{$styleSelectorName});
            }
        }

        return null;
    }

    public static function extractStyleSelectors(\SimpleXMLElement $element): array
    {
        $kmlElementParserFactory = KmlElementParserFactory::getInstance();

        $styleSelectors = [];

        foreach ($element->children() as $child) {
            if (in_array($child->getName(), self::$styleSelectorNames, true)) {
                $parser = $kmlElementParserFactory->getParserByElementName($child->getName());
                $styleSelectors[] = $parser->parse($child);
            }
        }

        return $styleSelectors;
    }
}
