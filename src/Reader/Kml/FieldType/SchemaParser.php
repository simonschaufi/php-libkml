<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Schema;

class SchemaParser
{
    public static function parse(\SimpleXMLElement $xmlElement): ?Schema
    {
        return self::parseSchemaElement($xmlElement);
    }

    public static function parseList(\SimpleXMLElement $xmlElement): array
    {
        $schemas = [];

        foreach ($xmlElement->children() as $xmlElementChildren) {
            if ($xmlElementChildren->getName() === 'Schema') {
                $schemas[] = self::parseSchemaElement($xmlElementChildren);
            }
        }

        return $schemas;
    }

    private static function parseSchemaElement(\SimpleXMLElement $xmlElement): Schema
    {
        $schema = new Schema();

        if (isset($xmlElement['id'])) {
            $schema->setId((string)$xmlElement['id']);
        }

        if (isset($xmlElement['name'])) {
            $schema->setName((string)$xmlElement['name']);
        }

        $schema->setFields(SimpleFieldParser::parseList($xmlElement));
        return $schema;
    }
}
