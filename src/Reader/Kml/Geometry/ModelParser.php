<?php

namespace LibKml\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\Geometry\Model;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\FieldType\OrientationParser;
use LibKml\Reader\Kml\FieldType\ResourceMapParser;
use LibKml\Reader\Kml\KmlElementParserFactory;
use LibKml\Reader\Kml\KmlObjectParser;
use SimpleXMLElement;

class ModelParser extends KmlObjectParser {

  private $linkParser;

  public function __construct() {
    $this->linkParser = KmlElementParserFactory::getInstance()
      ->getParserByElementName(KmlElementParserFactory::LINK);
  }

  protected function buildKmlObject(): KmlObject {
    return new Model();
  }

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->altitudeMode)) {
      $kmlObject->setAltitudeMode($element->altitudeMode);
    }

    if (isset($element->Location)) {
      $kmlObject->setLocation($this->parseLocation($element->Location));
    }

    if (isset($element->Orientation)) {
      $orientation = OrientationParser::parse($element->Orientation);
      $kmlObject->setOrientation($orientation);
    }

    if (isset($element->ResourceMap)) {
      $resourceMap = ResourceMapParser::parse($element->ResourceMap);
      $kmlObject->setResourceMap($resourceMap);
    }

    if (isset($element->Link)) {
      $link = $this->linkParser->parse($element->Link);
      $kmlObject->setLink($link);
    }
  }

  private function parseLocation(SimpleXMLElement $element): Coordinates {
    $coordinates = new Coordinates();

    if (isset($element->longitude)) {
      $coordinates->setLongitude(floatval($element->longitude));
    }

    if (isset($element->latitude)) {
      $coordinates->setLatitude(floatval($element->latitude));
    }

    if (isset($element->altitude)) {
      $coordinates->setAltitude(floatval($element->altitude));
    }

    return $coordinates;
  }

}
