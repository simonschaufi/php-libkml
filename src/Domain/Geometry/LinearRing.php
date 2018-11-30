<?php

namespace LibKml\Domain\Geometry;

use LibKml\Domain\KmlObjectVisitor;

/**
 * LinearRing class.
 */
class LinearRing extends Geometry {

  private $extrude;
  private $tessellate;
  private $altitudeMode;
  private $coordinates = array();

  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitLinearRing($this);
  }

  public function addCoordinate($coordinate) {
    $this->coordinates[] = $coordinate;
  }

  public function clearCoordinates() {
    $this->coordinates = array();
  }

  public function getExtrude() {
    return $this->extrude;
  }

  public function setExtrude($extrude) {
    $this->extrude = $extrude;
  }

  public function getTessellate() {
    return $this->tessellate;
  }

  public function setTessellate($tessellate) {
    $this->tessellate = $tessellate;
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

  public function setCoordinates(array $coordinates) {
    $this->coordinates = $coordinates;
  }

}
