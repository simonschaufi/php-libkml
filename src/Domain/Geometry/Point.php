<?php

namespace LibKml\Domain\Geometry;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * Point class.
 */
class Point extends Geometry {

  private $extrude = 0;
  private $altitudeMode;
  private $coordinates;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitPoint($this);
  }

  public function getExtrude(): bool {
    return $this->extrude;
  }

  public function setExtrude(bool $extrude): void {
    $this->extrude = $extrude;
  }

  public function getAltitudeMode(): string {
    return $this->altitudeMode;
  }

  public function setAltitudeMode(string $altitudeMode): void {
    $this->altitudeMode = $altitudeMode;
  }

  public function getCoordinates(): ?Coordinates {
    return $this->coordinates;
  }

  public function setCoordinates(?Coordinates $coordinates): void {
    $this->coordinates = $coordinates;
  }

}
