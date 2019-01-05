<?php

namespace LibKml\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\FieldType\ColorParser;
use LibKml\Reader\Kml\KmlObjectParser;
use SimpleXMLElement;

/**
 * Parses ColorStyle KML entities.
 *
 * @package LibKml\Reader\Kml\SubStyle\ColorStyle
 */
abstract class ColorStyleParser extends KmlObjectParser {

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->color)) {
      $kmlObject->setColor(ColorParser::parse($element->color));
    }

    if (isset($element->colorMode)) {
      $kmlObject->setColorMode(trim($element->colorMode));
    }
  }

}
