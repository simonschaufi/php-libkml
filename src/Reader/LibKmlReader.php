<?php

namespace LibKml\Reader;

use LibKml\KmlDocument;

/**
 * Builder for KmlDocument.
 */
class LibKmlReader {

  /**
   * Build a KmlDocument from a KML string.
   *
   * @param string $kml
   *   KML content.
   *
   * @return KmlDocument
   *   Parsed KML document.
   */
  public static function fromKml(string $kml): KmlDocument {
    return self::parse("kml", $kml);
  }

  private static function parse($type, $content): KmlDocument {
    $parserFactory = ParserFactory::getInstance();
    $parser = $parserFactory->getParser($type);
    return $parser->parse($content);
  }

}
