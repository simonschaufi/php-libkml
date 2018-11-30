<?php

namespace LibKML\Domain\Geometry;

/**
 * Polygon class.
 */
class Polygon extends Geometry {

  private $extrude;
  private $tessellate;
  private $altitudeMode;
  private $outerBoundaryIs;
  private $innerBoundaryIs;

  /**
   *
   */
  public function getExtrude() {
    return $this->extrude;
  }

  /**
   *
   */
  public function setExtrude($extrude) {
    $this->extrude = $extrude;
  }

  /**
   *
   */
  public function getTessellate() {
    return $this->tessellate;
  }

  /**
   *
   */
  public function setTessellate($tessellate) {
    $this->tessellate = $tessellate;
  }

  /**
   *
   */
  public function getAltitudeMode() {
    return $this->altitudeMode;
  }

  /**
   *
   */
  public function setAltitudeMode($altitudeMode) {
    $this->altitudeMode = $altitudeMode;
  }

  /**
   *
   */
  public function getOuterBoundaryIs() {
    return $this->outerBoundaryIs;
  }

  /**
   *
   */
  public function setOuterBoundaryIs($outerBoundaryIs) {
    $this->outerBoundaryIs = $outerBoundaryIs;
  }

  /**
   *
   */
  public function getInnerBoundaryIs() {
    return $this->innerBoundaryIs;
  }

  /**
   *
   */
  public function setInnerBoundaryIs($innerBoundaryIs) {
    $this->innerBoundaryIs = $innerBoundaryIs;
  }

}
