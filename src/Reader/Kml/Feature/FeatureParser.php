<?php

namespace LibKml\Reader\Kml\Feature;

use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\KmlObjectParser;
use SimpleXMLElement;

abstract class FeatureParser extends KmlObjectParser {

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->name)) {
      $kmlObject->setName($element->name);
    }
    if (isset($element->open)) {
      $kmlObject->setOpen((bool) $element->open);
    }
    if (isset($element->description)) {
      $kmlObject->setDescription($element->description);
    }
  }

}
