<?php

namespace LibKML\Domain\Geometry;

/**
 * MultiGeometry class.
 */
class MultiGeometry extends Geometry {

  private $geometries = array();

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
