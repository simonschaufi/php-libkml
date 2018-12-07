<?php

namespace LibKml\Reader;

use LibKml\Domain\KmlDocument;

/**
 * Builder for KmlDocument.
 */
class LibKmlReader {

  private $parserFactory;

  public function __construct(ParserFactory $parserFactory = NULL) {
    if ($parserFactory === NULL) {
      $parserFactory = ParserFactory::getInstance();
    }
    $this->parserFactory = $parserFactory;
  }

  /**
   * Build a KmlDocument from a KML string.
   *
   * @param string $kml
   *   KML content.
   *
   * @return \LibKml\Domain\KmlDocument
   *   Parsed KML document.
   */
  public function fromKml(string $kml): KmlDocument {
    return $this->parse(ParserFactory::KML, $kml);
  }

  private function parse($type, $content): KmlDocument {
    $parser = $this->parserFactory->getParser($type);
    return $parser->parse($content);
  }

}
