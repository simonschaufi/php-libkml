<?php

namespace LibKml\Parser;

use LibKml\Parser\Kml\KmlParser;

class ParserFactory {

  const KML_STRING = "kml";

  /**
   * Creates a parser for the type argument.
   *
   * @param string $type The type of data to be parsed
   *
   * @return ParserInterface A parser for the type
   *
   * @throws UnsupportedFormat Parse target not supported.
   */
  public static function create(string $type): ParserInterface {
    switch ($type) {
      case self::KML_STRING:
        return new KmlParser();

      default:
        throw new UnsupportedFormat();
    }
  }

}
