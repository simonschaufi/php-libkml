<?php

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\KmlObject;

/**
 * AbstractView abstract class.
 */
abstract class AbstractView extends KmlObject {

  private $longitude;
  private $latitude;
  private $altitude;
  private $heading = 0;
  private $tilt;
  private $roll;
  private $altitudeMode;

  public function getLongitude(): float {
    return $this->longitude;
  }

  public function setLongitude(float $longitude) {
    $this->longitude = $longitude;
  }

  public function getLatitude(): float {
    return $this->latitude;
  }

  public function setLatitude(float $latitude) {
    $this->latitude = $latitude;
  }

  public function getAltitude(): float {
    return $this->altitude;
  }

  public function setAltitude(float $altitude) {
    $this->altitude = $altitude;
  }

  public function getHeading(): float {
    return $this->heading;
  }

  public function setHeading(float $heading) {
    $this->heading = $heading;
  }

  public function getTilt(): float {
    return $this->tilt;
  }

  public function setTilt(float $tilt) {
    $this->tilt = $tilt;
  }

  public function getRoll(): float {
    return $this->roll;
  }

  public function setRoll(float $roll) {
    $this->roll = $roll;
  }

  public function getAltitudeMode() {
    return $this->altitudeMode;
  }

  public function setAltitudeMode($altitudeMode) {
    $this->altitudeMode = $altitudeMode;
  }

}
