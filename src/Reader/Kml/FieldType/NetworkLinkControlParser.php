<?php

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\NetworkLinkControl;
use LibKml\Reader\Kml\AbstractView\AbstractViewExtractor;
use SimpleXMLElement;

class NetworkLinkControlParser {

  public static function parse(SimpleXMLElement $element) {
    $networkLinkControl = new NetworkLinkControl();

    if (isset($element->minRefreshPeriod)) {
      $networkLinkControl->setMinRefreshPeriod(floatval($element->minRefreshPeriod));
    }

    if (isset($element->maxSessionLength)) {
      $networkLinkControl->setMaxSessionLength(floatval($element->maxSessionLength));
    }

    if (isset($element->cookie)) {
      $networkLinkControl->setCookie($element->cookie);
    }
    
    if (isset($element->message)) {
      $networkLinkControl->setMessage($element->message);
    }
    
    if (isset($element->linkName)) {
      $networkLinkControl->setLinkName($element->linkName);
    }

    if (isset($element->linkDescription)) {
      $networkLinkControl->setLinkDescription($element->linkDescription);
    }

    if (isset($element->linkSnippet)) {
      $networkLinkControl->setLinkSnippet($element->linkSnippet);
    }

    if (isset($element->expires)) {
      $networkLinkControl->setExpires($element->expires);
    }
    
    $view = AbstractViewExtractor::extract($element);
    $networkLinkControl->setAbstractView($view);

    return $networkLinkControl;
  }

}
