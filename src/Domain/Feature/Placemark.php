<?php

namespace LibKml\Domain\Feature;

use LibKml\Domain\Geometry\Geometry;
use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * A Placemark is a Feature with associated Geometry.
 */
class Placemark extends Feature {

  private $geometry;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitPlacemark($this);
  }

  public function getGeometry(): ?Geometry {
    return $this->geometry;
  }

  public function setGeometry(?Geometry $geometry): void {
    $this->geometry = $geometry;
  }

}
