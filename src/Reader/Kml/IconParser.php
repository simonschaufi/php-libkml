<?php

namespace LibKml\Reader\Kml;

use LibKml\Domain\Icon;
use LibKml\Domain\KmlObject;
use SimpleXMLElement;

class IconParser extends KmlObjectParser {

  protected function buildKmlObject(): KmlObject {
    return new Icon();
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
      $kmlObject->setRefreshInterval(floatval($element->refreshInterval));
    }

    if (isset($element->viewRefreshMode)) {
      $kmlObject->setViewRefreshMode($element->viewRefreshMode);
    }

    if (isset($element->viewRefreshTime)) {
      $kmlObject->setViewRefreshTime(floatval($element->viewRefreshTime));
    }

    if (isset($element->viewBoundScale)) {
      $kmlObject->setViewBoundScale(floatval($element->viewBoundScale));
    }

    if (isset($element->viewFormat)) {
      $kmlObject->setViewFormat($element->viewFormat);
    }

    if (isset($element->httpQuery)) {
      $kmlObject->setHttpQuery($element->httpQuery);
    }
  }

}
