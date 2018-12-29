<?php

namespace LibKml\Reader\Kml\SubStyle;

use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\BalloonStyle;
use LibKml\Reader\Kml\FieldType\ColorParser;
use LibKml\Reader\Kml\KmlObjectParser;
use SimpleXMLElement;

class BalloonStyleParser extends KmlObjectParser {

  protected function buildKmlObject(): KmlObject {
    return new BalloonStyle();
  }

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->bgColor)) {
      $kmlObject->setBgColor(ColorParser::parse($element->bgColor));
    }

    if (isset($element->textColor)) {
      $kmlObject->setTextColor(ColorParser::parse($element->textColor));
    }

    if (isset($element->text)) {
      $kmlObject->setText($element->text);
    }

    if (isset($element->displayMode)) {
      $kmlObject->setDisplayMode($element->displayMode);
    }
  }

}
