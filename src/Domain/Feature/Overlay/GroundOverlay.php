<?php

namespace LibKml\Domain\Feature\Overlay;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * GroundOverlay class.
 */
class GroundOverlay extends Overlay {

  private $altitude;
  private $altitudeMode;
  private $latLonBox;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitGroundOverlay($this);
  }

  public function getAltitude() {
    return $this->altitude;
  }

  public function setAltitude($altitude) {
    $this->altitude = $altitude;
  }

  public function getAltitudeMode() {
    return $this->altitudeMode;
  }

  public function setAltitudeMode($altitudeMode) {
    $this->altitudeMode = $altitudeMode;
  }

  public function getLatLonBox() {
    return $this->latLonBox;
  }

  public function setLatLonBox($latLonBox) {
    $this->latLonBox = $latLonBox;
  }

}
