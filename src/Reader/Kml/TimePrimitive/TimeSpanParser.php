<?php

namespace LibKml\Reader\Kml\TimePrimitive;

use LibKml\Domain\KmlObject;
use LibKml\Domain\TimePrimitive\TimeSpan;
use LibKml\Reader\Kml\KmlObjectParser;
use SimpleXMLElement;

class TimeSpanParser extends KmlObjectParser {

  protected function buildKmlObject(): KmlObject {
    return new TimeSpan();
  }

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    
    if (isset($element->begin)) {
      $kmlObject->setBegin(trim($element->begin));
    }

    if (isset($element->end)) {
      $kmlObject->setEnd(trim($element->end));
    }
    
  }
}
