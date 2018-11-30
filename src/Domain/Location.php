<?php

namespace LibKml\Domain;

/**
 * Location class.
 */
class Location {

  private $longitude;
  private $latitude;
  private $altitude;

  /**
   * @param KmlObjectVisitor $visitor
   */
  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitLocation($this);
  }

  /**
   *
   */
  public function getLongitude() {
    return $this->longitude;
  }

  /**
   *
   */
  public function setLongitude($longitude) {
    $this->longitude = $longitude;
  }

  /**
   *
   */
  public function getLatitude() {
    return $this->latitude;
  }

  /**
   *
   */
  public function setLatitude($latitude) {
    $this->latitude = $latitude;
  }

  /**
   *
   */
  public function getAltitude() {
    return $this->altitude;
  }

  /**
   *
   */
  public function setAltitude($altitude) {
    $this->altitude = $altitude;
  }

}
