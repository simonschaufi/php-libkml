<?php

namespace LibKml\Reader\Kml\Feature\Overlay;

use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\Feature\FeatureParser;
use LibKml\Reader\Kml\FieldType\ColorParser;
use LibKml\Reader\Kml\KmlElementParserFactory;
use SimpleXMLElement;

abstract class OverlayParser extends FeatureParser {

  protected $iconParser;

  public function __construct() {
    $this->iconParser = KmlElementParserFactory::getInstance()
      ->getParserByElementName("Icon");
  }

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->color)) {
      $kmlObject->setColor(ColorParser::parse($element->color));
    }

    if (isset($element->drawOrder)) {
      $kmlObject->setDrawOrder(intval($element->drawOrder));
    }

    if (isset($element->Icon)) {
      $icon = $this->iconParser->parse($element->Icon);
      $kmlObject->setIcon($icon);
    }

  }

}
