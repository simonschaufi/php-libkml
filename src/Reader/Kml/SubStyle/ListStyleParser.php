<?php

namespace LibKml\Reader\Kml\SubStyle;

use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\ListStyle;
use LibKml\Reader\Kml\KmlObjectParser;
use SimpleXMLElement;

class ListStyleParser extends KmlObjectParser {

  protected function buildKmlObject(): KmlObject {
    return new ListStyle();
  }

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->listItemType)) {
      $kmlObject->setListItemType($element->listItemType);
    }
  }

}
