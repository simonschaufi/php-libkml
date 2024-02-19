<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\TimePrimitive;

use LibKml\Domain\TimePrimitive\TimePrimitive;
use LibKml\Reader\Kml\KmlElementParserFactory;

class TimePrimitiveExtractor
{
    public const ELEMENT_TAGS = ['TimeSpan', 'TimeStamp'];

    public static function extract(\SimpleXMLElement $element): ?TimePrimitive
    {
        $kmlElementParserFactory = KmlElementParserFactory::getInstance();

        foreach ($element->children() as $elementChildren) {
            if (in_array($elementChildren->getName(), self::ELEMENT_TAGS)) {
                $parser = $kmlElementParserFactory->getParserByElementName($elementChildren->getName());
                return $parser->parse($elementChildren);
            }
        }

        return null;
    }
}
