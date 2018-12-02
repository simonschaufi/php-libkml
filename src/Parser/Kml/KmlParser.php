<?php

namespace LibKml\Parser\Kml;

use LibKml\KmlDocument;
use LibKml\Parser\ParserInterface;
use SimpleXMLElement;

/**
 * Parses a KML string.
 */
class KmlParser implements ParserInterface {

  private $kmlObjectParsers = [];

  public function parse(string $content): KmlDocument {
    // TODO: Implement parse() method.
  }

  public function getKmlObjectParser(SimpleXMLElement $element) {

  }

}
