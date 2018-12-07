<?php

namespace LibKml\Reader\Kml;

use LibKml\Domain\KmlObject;
use SimpleXMLElement;

abstract class KmlObjectParser implements KmlElementParserInterface {

  /**
   * Parses an XML node and returns a KmlObject.
   */
  public function parse(SimpleXMLElement $xmlNode): KmlObject {
    $kmlObject = $this->buildKmlObject();
    $this->loadValues($kmlObject, $xmlNode);
    return $kmlObject;
  }

  abstract protected function buildKmlObject(): KmlObject;

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    if (isset($element->attributes()["id"])) {
      $kmlObject->setId($element["id"]);
    }
    if (isset($element->attributes()["targetId"])) {
      $kmlObject->setTargetId($element["targetId"]);
    }
  }

}
