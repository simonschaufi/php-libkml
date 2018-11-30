<?php

namespace LibKml\Domain\Geometry;

use LibKml\Domain\KmlObjectVisitor;

/**
 * Point class.
 */
class Point extends Geometry {

  /**
   * @var bool
   */
  private $extrude;
  private $altitudeMode;
  private $coordinates;

  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitPoint($this);
  }

  public function getExtrude() {
    return $this->extrude;
  }

  public function setExtrude(bool $extrude) {
    $this->extrude = $extrude;
  }

  public function getAltitudeMode() {
    return $this->altitudeMode;
  }

  public function setAltitudeMode($altitudeMode) {
    $this->altitudeMode = $altitudeMode;
  }

  public function getCoordinates() {
    return $this->coordinates;
  }

  public function setCoordinates($coordinates) {
    $this->coordinates = $coordinates;
  }

}