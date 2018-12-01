<?php

namespace LibKml\Domain;

/**
 * Location class.
 */
class Location {

  private $longitude;
  private $latitude;
  private $altitude;

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

}
