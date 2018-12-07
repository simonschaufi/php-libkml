<?php

namespace LibKml\Domain\Feature\Overlay;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\LatLonBox;

/**
 * GroundOverlay class.
 */
class GroundOverlay extends Overlay {

  private $altitude = 0;
  private $altitudeMode = AltitudeMode::CLAMP_TO_GROUND;
  private $latLonBox;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitGroundOverlay($this);
  }

  public function getAltitude(): float {
    return $this->altitude;
  }

  public function setAltitude(float $altitude): void {
    $this->altitude = $altitude;
  }

  public function getAltitudeMode(): string {
    return $this->altitudeMode;
  }

  public function setAltitudeMode(string $altitudeMode): void {
    $this->altitudeMode = $altitudeMode;
  }

  public function getLatLonBox(): ?LatLonBox {
    return $this->latLonBox;
  }

  public function setLatLonBox(?LatLonBox $latLonBox): void {
    $this->latLonBox = $latLonBox;
  }

}
