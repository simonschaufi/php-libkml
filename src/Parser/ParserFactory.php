<?php

namespace LibKml\Parser;

use LibKml\Parser\Kml\KmlParser;

class ParserFactory {

  const KML_STRING = "kml";

  private $parsers;

  /**
   * Returns a parser for the type argument.
   *
   * @param string $type The type of data to be parsed
   *
   * @return ParserInterface A parser for the type
   *
   * @throws UnsupportedFormat Parse target not supported.
   */
  public function getParser(string $type): ParserInterface {
    switch ($type) {
      case self::KML_STRING:
        if (!isset($this->parsers[self::KML_STRING])) {
          $this->parsers[self::KML_STRING] = new KmlParser();
        }
        return $this->parsers[self::KML_STRING];
      default:
        throw new UnsupportedFormat();
    }
  }

}
