<?php

namespace LibKml\Reader\Kml;

use LibKml\Domain\KmlObject;
use LibKml\Domain\Link;
use SimpleXMLElement;

class LinkParser extends KmlObjectParser {

  protected function buildKmlObject(): KmlObject {
    return new Link();
  }


  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->href)) {
      $kmlObject->setHref($element->href);
    }

    if (isset($element->refreshMode)) {
      $kmlObject->setRefreshMode($element->refreshMode);
    }

    if (isset($element->refreshInterval)) {
      $kmlObject->setRefreshInterval($element->refreshInterval);
    }

    if (isset($element->viewRefreshMode)) {
      $kmlObject->setViewRefreshMode($element->viewRefreshMode);
    }

    if (isset($element->viewRefreshTime)) {
      $kmlObject->setViewRefreshTime($element->viewRefreshTime);
    }

    if (isset($element->viewFormat)) {
      $kmlObject->setViewFormat($element->viewFormat);
    }
  }
}
