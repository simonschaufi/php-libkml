<?php

namespace LibKml\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\KmlObjectParser;
use SimpleXMLElement;

abstract class ColorStyleParser extends KmlObjectParser {

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);


  }

}
