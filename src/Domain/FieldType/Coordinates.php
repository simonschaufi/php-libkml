<?php

namespace LibKml\Domain\FieldType;

/**
 * Coordinates class type.
 */
class Coordinates {

  private $longitude = 0;
  private $latitude = 0;
  private $altitude = 0;

  public function getLongitude() {
    return $this->longitude;
  }

  public function setLongitude(float $longitude) {
    $this->longitude = $longitude;
  }

  public function getLatitude() {
    return $this->latitude;
  }

  public function setLatitude(float $latitude) {
    $this->latitude = $latitude;
  }

  public function getAltitude() {
    return $this->altitude;
  }

  public function setAltitude(float $altitude) {
    $this->altitude = $altitude;
  }

}
