<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\Geometry;

use LibKml\Domain\Geometry\Geometry;
use LibKml\Reader\Kml\KmlElementParserFactory;

/**
 * Extracts geometry objects contained in a KML Element.
 */
class GeometryExtractor
{
    private static array $geometryNames = [
        'Point',
        'LineString',
        'LinearRing',
        'Polygon',
        'MultiGeometry',
        'Model',
    ];

    public static function extractGeometry(\SimpleXMLElement $element): ?Geometry
    {
        $kmlElementParserFactory = KmlElementParserFactory::getInstance();

        foreach (self::$geometryNames as $geometryName) {
            if (isset($element->{$geometryName})) {
                $parser = $kmlElementParserFactory->getParserByElementName($geometryName);
                return $parser->parse($element->{$geometryName});
            }
        }

        return null;
    }

    public static function extractGeometries(\SimpleXMLElement $element): array
    {
        $kmlElementParserFactory = KmlElementParserFactory::getInstance();

        $geometries = [];

        foreach ($element->children() as $geometryElement) {
            if (in_array($geometryElement->getName(), self::$geometryNames, true)) {
                $parser = $kmlElementParserFactory->getParserByElementName($geometryElement->getName());
                $geometries[] = $parser->parse($geometryElement);
            }
        }

        return $geometries;
    }
}
