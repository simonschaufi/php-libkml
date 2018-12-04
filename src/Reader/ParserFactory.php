<?php

namespace LibKml\Reader;

use LibKml\Reader\Kml\KmlParser;
use LibKml\UnsupportedFormat;

/**
 * Serves a parser for a type.
 */
class ParserFactory {

  const KML = "kml";

  private static $instance;

  private $parsers = [];

  public static function getInstance(): ParserFactory {
    if (!isset(self::$instance)) {
      self::$instance = new ParserFactory();
    }
    return self::$instance;
  }

  private function __construct() {
  }

  /**
   * Returns a parser for the type argument.
   *
   * @param string $type
   *   The type of data to be parsed.
   *
   * @return ParserInterface
   *   A parser for the type.
   *
   * @throws UnsupportedFormat
   *   Parse target not supported.
   */
  public function getParser(string $type): ParserInterface {
    if (!array_key_exists($type, $this->parsers)) {
      switch ($type) {
        case self::KML:
          $this->parsers[$type] = new KmlParser();
          break;

        default:
          throw new UnsupportedFormat();
      }
    }

    return $this->parsers[$type];
  }

}
