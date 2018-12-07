<?php

namespace LibKml\Reader\Kml\AbstractView;

use LibKml\Domain\AbstractView\LookAt;
use LibKml\Domain\KmlObject;
use SimpleXMLElement;

/**
 * Parses LookAt kml entities.
 */
class LookAtParser extends AbstractViewParser {

  protected function buildKmlObject(): KmlObject {
    return new LookAt();
  }

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->range)) {
      $kmlObject->setRange(floatval($element->range));
    }
  }

}
