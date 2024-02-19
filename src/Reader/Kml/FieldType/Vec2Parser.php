<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Vec2;

class Vec2Parser
{
    public static function parse(\SimpleXMLElement $xmlElement): Vec2
    {
        $vec2 = new Vec2();

        if (isset($xmlElement['x'])) {
            $vec2->setX((float)$xmlElement['x']);
        }

        if (isset($xmlElement['y'])) {
            $vec2->setY((float)$xmlElement['y']);
        }

        if (isset($xmlElement['xunits'])) {
            $vec2->setXUnits(trim((string)$xmlElement['xunits']));
        }

        if (isset($xmlElement['yunits'])) {
            $vec2->setYUnits(trim((string)$xmlElement['yunits']));
        }

        return $vec2;
    }
}
