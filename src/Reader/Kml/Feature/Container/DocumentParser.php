<?php

namespace LibKml\Reader\Kml\Feature\Container;

use LibKml\Domain\Feature\Container\Document;
use LibKml\Domain\KmlObject;
use SimpleXMLElement;

class DocumentParser extends ContainerParser {

  protected function buildKmlObject(): KmlObject {
    return new Document();
  }

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

  }

}
