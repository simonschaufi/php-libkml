<?php

namespace LibKml\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\ColorStyle\LabelStyle;
use SimpleXMLElement;

class LabelStyleParser extends ColorStyleParser {

  protected function buildKmlObject(): KmlObject {
    return new LabelStyle();
  }

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->scale)) {
      $kmlObject->setScale(floatval($element->scale));
    }
  }

}
