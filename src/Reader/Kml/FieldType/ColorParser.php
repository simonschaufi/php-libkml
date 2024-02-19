<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Color;

class ColorParser
{
    public static function parse(string $rgba): ?Color
    {
        if (strlen($rgba) !== 8) {
            return null;
        }

        $colorComponents = str_split($rgba, 2);

        $red = hexdec($colorComponents[3]);
        $green = hexdec($colorComponents[2]);
        $blue = hexdec($colorComponents[1]);
        $alpha = hexdec($colorComponents[0]) / 0xFF;

        return Color::fromRGBA($red, $green, $blue, $alpha);
    }
}
