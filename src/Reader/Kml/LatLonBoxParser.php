<?php

namespace LibKml\Reader\Kml;

use LibKml\Domain\LatLonBox;
use SimpleXMLElement;

class LatLonBoxParser {

  public static function parse(SimpleXMLElement $kmlElement): LatLonBox {
    $latLonBox = new LatLonBox();

    if (isset($kmlElement->north)) {
      $latLonBox->setNorth(floatval($kmlElement->north));
    }

    if (isset($kmlElement->south)) {
      $latLonBox->setSouth(floatval($kmlElement->south));
    }

    if (isset($kmlElement->east)) {
      $latLonBox->setEast(floatval($kmlElement->east));
    }

    if (isset($kmlElement->west)) {
      $latLonBox->setWest(floatval($kmlElement->west));
    }

    if (isset($kmlElement->rotation)) {
      $latLonBox->setRotation(floatval($kmlElement->rotation));
    }

    return $latLonBox;
  }

}
