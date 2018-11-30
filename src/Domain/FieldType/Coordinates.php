<?php

namespace LibKml\Domain\FieldType;

/**
 * Coordinates class type.
 */
class Coordinates {

  /**
   * @var float
   */
  private $longitude = 0;

  /**
   * @var float
   */
  private $latitude = 0;

  /**
   * @var float
   */
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
