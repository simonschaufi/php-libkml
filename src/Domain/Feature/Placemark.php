<?php

namespace LibKml\Domain\Feature;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * Placemark abstract class.
 */
class Placemark extends Feature {

  private $geometry;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitPlacemark($this);
  }

  public function getAllFeatures() {
    return array($this->geometry);
  }

  public function getGeometry() {
    return $this->geometry;
  }

  public function setGeometry($geometry) {
    $this->geometry = $geometry;
  }

}
