<?php

namespace LibKml\Reader\Kml;

use LibKml\Domain\KmlDocument;
use LibKml\Reader\Kml\Feature\FeatureExtractor;
use LibKml\Reader\Kml\FieldType\NetworkLinkControlParser;
use LibKml\Reader\ParserInterface;
use LibKml\Reader\WrongDocumentFormat;
use SimpleXMLElement;

/**
 * Parses a KML string.
 */
class KmlParser implements ParserInterface {

  public function parse(string $content): ?KmlDocument {
    $xmlDocument = simplexml_load_string($content);
    if ($xmlDocument->getName() !== "kml") {
      throw new WrongDocumentFormat();
    }

    return $this->parseKmlElement($xmlDocument->kml);
  }

  public function parseKmlElement(SimpleXMLElement $element): ?KmlDocument {
    $kmlDocument = new KmlDocument();

    if (isset($element->NetworkLinkControl)) {
      $networkLinkControl = NetworkLinkControlParser::parse($element->NetworkLinkControl);
      $kmlDocument->setNetworkLinkControl($networkLinkControl);
    }

    $feature = FeatureExtractor::extractFeature($element);
    if ($feature !== NULL) {
      $kmlDocument->setFeature($feature);
    }

    return $kmlDocument;
  }

}
