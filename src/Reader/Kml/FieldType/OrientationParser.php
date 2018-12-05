<?php

namespace LibKml\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Orientation;
use SimpleXMLElement;

class OrientationParser {

  public static function parse(SimpleXMLElement $element): Orientation {
    $orientation = new Orientation();

    if (isset($element->heading)) {
      $orientation->setHeading(floatval($element->heading));
    }

    if (isset($element->tilt)) {
      $orientation->setTilt(floatval($element->tilt));
    }

    if (isset($element->roll)) {
      $orientation->setRoll(floatval($element->roll));
    }

    return $orientation;
  }

}
