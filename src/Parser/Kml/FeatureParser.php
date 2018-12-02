<?php

namespace LibKml\Parser\Kml;

use LibKml\Domain\KmlObject;
use SimpleXMLElement;

abstract class FeatureParser extends KmlObjectParser {

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);
  }

}
