<?php
namespace libKML;

/**
 *  Location class
 */

require_once("KMLObject.php");

class Location extends KMLObject {
  
  private $longitude;
  private $latitude;
  private $altitude;
  
  public function setLongitude($longitude) {
    $this->longitude = $longitude;
  }
  
  public function getLongitude() {
    return $this->longitude;
  }
  
  public function setLatitude($latitude) {
    $this->latitude = $latitude;
  }
  
  public function getLatitude() {
    return $this->latitude;
  }
  
  public function setAltitude($altitude) {
    $this->altitude = $altitude;
  }
  
  public function getAltitude() {
    return $this->altitude;
  }
  
}

?>