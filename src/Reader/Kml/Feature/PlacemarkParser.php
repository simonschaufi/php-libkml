<?php

namespace LibKml\Reader\Kml\Feature;

use LibKml\Domain\Feature\Placemark;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\KmlElementParserFactory;
use SimpleXMLElement;

class PlacemarkParser extends FeatureParser {

  private $kmlElementParserFactory;

  function __construct() {
    $this->kmlElementParserFactory = KmlElementParserFactory::getInstance();
  }

  protected function buildKmlObject(): KmlObject {
    return new Placemark();
  }

  protected function loadValues(
      KmlObject &$kmlObject,
      SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);
  }
}
