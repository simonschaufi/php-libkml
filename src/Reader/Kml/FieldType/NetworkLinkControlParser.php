<?php

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\NetworkLinkControl;
use SimpleXMLElement;

class NetworkLinkControlParser {

  public static function parse(SimpleXMLElement $element) {
    $networkLinkControl = new NetworkLinkControl();

    if (isset($element->message)) {
      $networkLinkControl->setMessage($element->message);
    }

    if (isset($element->cookie)) {
      $networkLinkControl->setCookie($element->cookie);
    }

    if (isset($element->linkName)) {
      $networkLinkControl->setLinkName($element->linkName);
    }

    if (isset($element->linkDescription)) {
      $networkLinkControl->setLinkDescription($element->linkDescription);
    }

    return $networkLinkControl;
  }

}
