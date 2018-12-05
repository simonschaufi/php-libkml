<?php

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Alias;
use LibKml\Domain\FieldType\ResourceMap;
use SimpleXMLElement;

/**
 * Parses ResourceMaps.
 */
class ResourceMapParser {

  public static function parse(SimpleXMLElement $element): ResourceMap {
    $resourceMap = new ResourceMap();

    foreach ($element->children() as $childElement) {
      if ($childElement->getName() === 'Alias') {
        $alias = new Alias();

        if (isset($childElement->sourceHref)) {
          $alias->setSourceHref($childElement->sourceHref);
        }

        if (isset($childElement->targetHref)) {
          $alias->setTargetHref($childElement->targetHref);
        }

        $resourceMap->addAlias($alias);
      }
    }

    return $resourceMap;
  }

}
