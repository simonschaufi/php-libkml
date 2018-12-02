<?php

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\Feature\AltitudeMode;
use LibKml\Domain\KmlObject;

/**
 * AbstractView abstract class.
 */
abstract class AbstractView extends KmlObject {

  private $longitude = 0;
  private $latitude = 0;
  private $altitude = 0;
  private $heading = 0;
  private $tilt = 0;
  private $roll = 0;
  private $altitudeMode = "relativeToGround";

  public function getLongitude(): float {
    return $this->longitude;
  }

  public function setLongitude(float $longitude): void {
    $this->longitude = $longitude;
  }

  public function getLatitude(): float {
    return $this->latitude;
  }

  public function setLatitude(float $latitude): void {
    $this->latitude = $latitude;
  }

  public function getAltitude(): float {
    return $this->altitude;
  }

  public function setAltitude(float $altitude): void {
    $this->altitude = $altitude;
  }

  public function getHeading(): float {
    return $this->heading;
  }

  public function setHeading(float $heading): void {
    $this->heading = $heading;
  }

  public function getTilt(): float {
    return $this->tilt;
  }

  public function setTilt(float $tilt): void {
    $this->tilt = $tilt;
  }

  public function getRoll(): float {
    return $this->roll;
  }

  public function setRoll(float $roll): void {
    $this->roll = $roll;
  }

  public function getAltitudeMode(): string {
    return $this->altitudeMode;
  }

  public function setAltitudeMode(string $altitudeMode): void {
    $this->altitudeMode = $altitudeMode;
  }

}
