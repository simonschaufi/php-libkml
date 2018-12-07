<?php

namespace LibKml\Reader\Kml\AbstractView;

use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\KmlElementParserFactory;
use SimpleXMLElement;

class AbstractViewExtractor {

  const ELEMENT_TAGS = ['Camera', 'LookAt'];

  public static function extract(SimpleXMLElement $element): ?KmlObject {
    $kmlElementParserFactory = KmlElementParserFactory::getInstance();

    foreach ($element->children() as $elementChildren) {
      if (in_array($elementChildren->getName(), self::ELEMENT_TAGS)) {
        $parser = $kmlElementParserFactory
          ->getParserByElementName($elementChildren->getName());
        return $parser->parse($elementChildren);
      }
    }

    return NULL;
  }

}
