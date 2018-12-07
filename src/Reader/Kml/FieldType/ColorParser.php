<?php

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Color;

class ColorParser {

  public static function parse(string $rgba): ?Color {
    if (strlen($rgba) <= 8 && strlen($rgba) >= 6) {
      $colorComponents = str_split($rgba, 2);

      $red = hexdec($colorComponents[0]);
      $green = hexdec($colorComponents[1]);
      $blue = hexdec($colorComponents[2]);
      $alpha = 1;
      if (count($colorComponents) === 4) {
        $alpha = hexdec($colorComponents[3]) / 0xFF;
      }

      return Color::fromRGBA($red, $green, $blue, $alpha);
    }
    return NULL;
  }

}
