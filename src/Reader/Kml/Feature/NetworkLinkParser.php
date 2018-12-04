<?php

namespace LibKml\Reader\Kml\Feature;

use LibKml\Domain\Feature\NetworkLink;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\KmlElementParserFactory;
use SimpleXMLElement;

class NetworkLinkParser extends FeatureParser {

  private $linkParser;

  function __construct() {
    $kmlElementParserFactory = KmlElementParserFactory::getInstance();
    $this->linkParser = $kmlElementParserFactory
      ->getParserByElementName(KmlElementParserFactory::LINK);
  }

  protected function buildKmlObject(): KmlObject {
    return new NetworkLink();
  }

  protected function loadValues(
      KmlObject &$kmlObject,
      SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->Link)) {
      $kmlObject->setLink($this->linkParser->parse($element->Link));
    }
  }
}
