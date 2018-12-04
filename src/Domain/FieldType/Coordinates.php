<?php

namespace LibKml\Domain\FieldType;

/**
 * Coordinates class type.
 */
class Coordinates {

  private $longitude = 0;
  private $latitude = 0;
  private $altitude = 0;

  public static function fromLonLatAlt($longitude, $latitude, $altitude): Coordinates {
    $coordinates = self::fromLonLat($longitude, $latitude);
    $coordinates->altitude = $altitude;
    return $coordinates;
  }

  public static function fromLonLat($longitude, $latitude): Coordinates {
    $coordinates = new Coordinates();
    $coordinates->longitude = $longitude;
    $coordinates->latitude = $latitude;
    return $coordinates;
  }

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
