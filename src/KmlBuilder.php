<?php

namespace LibKml;

use LibKml\Parser\ParserFactory;

/**
 * Builder for KmlDocument.
 */
class KmlBuilder {

  /**
   * Build an empty KmlDocument object.
   *
   * @return KmlDocument
   *   Empty KmlDocument object.
   */
  public static function build(): KmlDocument {
    return new KmlDocument();
  }

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

  private static function parse($type, $content) {
    $parser = ParserFactory::create($type);
    return $parser->parse($content);
  }

}
