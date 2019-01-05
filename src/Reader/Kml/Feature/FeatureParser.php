<?php

namespace LibKml\Reader\Kml\Feature;

use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\AbstractView\AbstractViewExtractor;
use LibKml\Reader\Kml\KmlObjectParser;
use LibKml\Reader\Kml\StyleSelector\StyleSelectorExtractor;
use SimpleXMLElement;

abstract class FeatureParser extends KmlObjectParser {

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->name)) {
      $kmlObject->setName($element->name);
    }

    if (isset($element->visibility)) {
      $kmlObject->setVisibility(filter_var($element->visibility, FILTER_VALIDATE_BOOLEAN));
    }

    if (isset($element->open)) {
      $kmlObject->setOpen(filter_var($element->open, FILTER_VALIDATE_BOOLEAN));
    }

    if (isset($element->address)) {
      $kmlObject->setAddress($element->address);
    }

    if (isset($element->phoneNumber)) {
      $kmlObject->setPhoneNumber($element->phoneNumber);
    }

    if (isset($element->Snippet)) {
      $kmlObject->setSnippet(trim($element->Snippet));
    }

    if (isset($element->description)) {
      $kmlObject->setDescription($element->description);
    }

    if (isset($element->styleUrl)) {
      $kmlObject->setStyleUrl($element->styleUrl);
    }

    $kmlObject->setAbstractView(AbstractViewExtractor::extract($element));

    $kmlObject->setStyleSelectors(StyleSelectorExtractor::extractStyleSelectors($element));
  }

}
