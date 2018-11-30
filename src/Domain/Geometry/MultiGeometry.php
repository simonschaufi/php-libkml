<?php

namespace LibKml\Domain\Geometry;

use LibKml\Domain\KmlObjectVisitor;

/**
 * MultiGeometry class.
 */
class MultiGeometry extends Geometry {

  private $geometries = array();

  /**
   * @param \LibKml\Domain\KmlObjectVisitor $visitor
   */
  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitMultiGeometry($this);
  }

  /**
   *
   */
  public function addGeometry($geometry) {
    $this->geometries[] = $geometry;
  }

  /**
   *
   */
  public function clearGeometries() {
    $this->geometries = array();
  }

  /**
   *
   */
  public function getGeometries() {
    return $this->geometries;
  }

  /**
   *
   */
  public function setGeometries($geometries) {
    $this->geometries = $geometries;
  }

}
