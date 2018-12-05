<?php

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\SimpleField;
use SimpleXMLElement;

class SimpleFieldParser {

  public static function parseList(SimpleXMLElement $xmlElement): array {
    $fields = [];

    foreach ($xmlElement->children() as $xmlElementChild) {
      if ($xmlElementChild->getName() === "SimpleField") {
        $fields[] = self::parseSimplefieldElement($xmlElementChild);
      }
    }

    return $fields;
  }

  private static function parseSimplefieldElement(SimpleXMLElement $xmlElement): SimpleField {
    $simpleField = new SimpleField();

    if (isset($xmlElement->type)) {
      $simpleField->setType($xmlElement->type);
    }

    if (isset($xmlElement->name)) {
      $simpleField->setName($xmlElement->name);
    }

    if (isset($xmlElement->displayName)) {
      $simpleField->setDisplayName($xmlElement->displayName);
    }

    return $simpleField;
  }

}
