<?php

namespace LibKml\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\ColorStyle\LineStyle;
use SimpleXMLElement;

class LineStyleParser extends ColorStyleParser {

  protected function buildKmlObject(): KmlObject {
    return new LineStyle();
  }

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->width)) {
      $kmlObject->setWidth(floatval($element->width));
    }
  }

}
