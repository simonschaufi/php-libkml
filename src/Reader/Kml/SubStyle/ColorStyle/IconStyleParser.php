<?php

namespace LibKml\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\ColorStyle\IconStyle;
use LibKml\Reader\Kml\FieldType\Vec2Parser;
use LibKml\Reader\Kml\KmlElementParserFactory;
use SimpleXMLElement;

class IconStyleParser extends ColorStyleParser {

  private $iconParser;

  public function __construct() {
    $this->iconParser = KmlElementParserFactory::getInstance()
      ->getParserByElementName(KmlElementParserFactory::ICON);
  }

  protected function buildKmlObject(): KmlObject {
    return new IconStyle();
  }

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->scale)) {
      $kmlObject->setScale(floatval($element->scale));
    }

    if (isset($element->heading)) {
      $kmlObject->setHeading(floatval($element->heading));
    }

    if (isset($element->hotSpot)) {
      $kmlObject->setHotSpot(Vec2Parser::parse($element->hotSpot));
    }

    if (isset($element->Icon)) {
      $icon = $this->iconParser->parse($element->Icon);
      $kmlObject->setIcon($icon);
    }
  }

}
