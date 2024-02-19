<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\AbstractView;

use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\KmlElementParserFactory;

class AbstractViewExtractor
{
    public const ELEMENT_TAGS = [
        'Camera',
        'LookAt',
    ];

    public static function extract(\SimpleXMLElement $element): ?KmlObject
    {
        $kmlElementParserFactory = KmlElementParserFactory::getInstance();

        foreach ($element->children() as $elementChildren) {
            if (in_array($elementChildren->getName(), self::ELEMENT_TAGS, true)) {
                $parser = $kmlElementParserFactory->getParserByElementName($elementChildren->getName());
                return $parser->parse($elementChildren);
            }
        }

        return null;
    }
}
