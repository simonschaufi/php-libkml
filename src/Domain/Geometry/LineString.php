<?php

namespace LibKml\Domain\Geometry;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * LineString class.
 */
class LineString extends Geometry {

  private $extrude;
  private $tessellate;
  private $altitudeMode;
  private $coordinates = [];

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitLineString($this);
  }

  public function addCoordinate($coordinate) {
    $this->coordinates[] = $coordinate;
  }

  public function clearCoordinates() {
    $this->coordinates = array();
  }

  public function getExtrude(): bool {
    return $this->extrude;
  }

  public function setExtrude(bool $extrude): void {
    $this->extrude = $extrude;
  }

  public function getTessellate(): bool {
    return $this->tessellate;
  }

  public function setTessellate(bool $tessellate): void {
    $this->tessellate = $tessellate;
  }

  public function getAltitudeMode(): string {
    return $this->altitudeMode;
  }

  public function setAltitudeMode(string $altitudeMode): void {
    $this->altitudeMode = $altitudeMode;
  }

  public function getCoordinates() {
    return $this->coordinates;
  }

  public function setCoordinates($coordinates) {
    $this->coordinates = $coordinates;
  }

}
