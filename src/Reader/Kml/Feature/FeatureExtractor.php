<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\Feature;

use LibKml\Domain\Feature\Feature;
use LibKml\Reader\Kml\KmlElementParserFactory;

class FeatureExtractor
{
    private static array $featureNames = [
        'NetworkLink',
        'Placemark',
        'PhotoOverlay',
        'ScreenOverlay',
        'GroundOverlay',
        'Folder',
        'Document',
    ];

    public static function extractFeature(\SimpleXMLElement $element): ?Feature
    {
        $kmlElementParserFactory = KmlElementParserFactory::getInstance();

        foreach (self::$featureNames as $featureName) {
            if (isset($element->{$featureName})) {
                $parser = $kmlElementParserFactory->getParserByElementName($featureName);
                return $parser->parse($element->{$featureName});
            }
        }

        return null;
    }

    public static function extractFeatures(\SimpleXMLElement $element): array
    {
        $kmlElementParserFactory = KmlElementParserFactory::getInstance();
        $features = [];

        foreach ($element->children() as $childElement) {
            if (in_array($childElement->getName(), self::$featureNames, true)) {
                $parser = $kmlElementParserFactory->getParserByElementName($childElement->getName());
                $features[] = $parser->parse($childElement);
            }
        }

        return $features;
    }
}
