<?php

namespace LibKml\Reader\Kml\AbstractView;

use LibKml\Domain\AbstractView\Camera;
use LibKml\Domain\KmlObject;
use SimpleXMLElement;

class CameraParser extends AbstractViewParser {

  protected function buildKmlObject(): KmlObject {
    return new Camera();
  }

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->roll)) {
      $kmlObject->setRoll(floatval($element->roll));
    }
  }

}
