<?php

namespace LibKml;

use LibKml\Parser\ParserFactory;

/**
 * Builder for KmlDocument.
 */
class KmlBuilder {

  private $parserFactory;

  public function __construct() {
    $this->parserFactory = new ParserFactory();
  }

  /**
   * Build an empty KmlDocument object.
   *
   * @return KmlDocument
   *   Empty KmlDocument object.
   */
  public function build(): KmlDocument {
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
  public function fromKml(string $kml): KmlDocument {
    return self::parse("kml", $kml);
  }

  private function parse($type, $content) {
    $parser = $this->parserFactory->getParser($type);
    return $parser->parse($content);
  }

}
