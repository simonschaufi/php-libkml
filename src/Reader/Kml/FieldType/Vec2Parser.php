<?php

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Vec2;
use SimpleXMLElement;

/**
 * Parses a KML Vec2 field element.
 *
 * @package LibKml\Tests\Reader\Kml\FieldType
 */
class Vec2Parser {

  public static function parse(SimpleXMLElement $xmlElement): Vec2 {
    $vec2 = new Vec2();

    if (isset($xmlElement['x'])) {
      $vec2->setX(floatval($xmlElement['x']));
    }

    if (isset($xmlElement['y'])) {
      $vec2->setY(floatval($xmlElement['y']));
    }

    if (isset($xmlElement['xunits'])) {
      $vec2->setXUnits(trim($xmlElement['xunits']));
    }

    if (isset($xmlElement['yunits'])) {
      $vec2->setYUnits(trim($xmlElement['yunits']));
    }

    return $vec2;
  }

}
