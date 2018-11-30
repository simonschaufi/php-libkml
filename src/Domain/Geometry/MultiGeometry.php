<?php

namespace LibKml\Domain\Geometry;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * MultiGeometry class.
 */
class MultiGeometry extends Geometry {

  private $geometries = [];

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitMultiGeometry($this);
  }

  public function addGeometry(Geometry $geometry) {
    $this->geometries[] = $geometry;
  }

  public function clearGeometries() {
    $this->geometries = [];
  }

  public function getGeometries() {
    return $this->geometries;
  }

  public function setGeometries(array $geometries) {
    $this->geometries = $geometries;
  }

}
