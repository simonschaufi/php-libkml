<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\SimpleField;

class SimpleFieldParser
{
    public static function parseList(\SimpleXMLElement $xmlElement): array
    {
        $fields = [];

        foreach ($xmlElement->children() as $xmlElementChild) {
            if ($xmlElementChild->getName() === 'SimpleField') {
                $fields[] = self::parseSimpleFieldElement($xmlElementChild);
            }
        }

        return $fields;
    }

    private static function parseSimpleFieldElement(\SimpleXMLElement $xmlElement): SimpleField
    {
        $simpleField = new SimpleField();

        if (isset($xmlElement['type'])) {
            $simpleField->setType((string)$xmlElement['type']);
        }

        if (isset($xmlElement['name'])) {
            $simpleField->setName((string)$xmlElement['name']);
        }

        if (isset($xmlElement->displayName)) {
            $simpleField->setDisplayName((string)$xmlElement->displayName);
        }

        return $simpleField;
    }
}
