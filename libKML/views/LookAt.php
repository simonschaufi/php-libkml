<?php
namespace libKML;

/**
 *  LookAt class
 */

class LookAt extends AbstractView {
  
  private $longitude;
  private $latitude;
  private $altitude;
  private $heading;
  private $tilt;
  private $range;
  private $altitudeMode;
  
  public function __toString() {
    $output = array();
    $output[] = sprintf("<LookAt%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    
    if (isset($this->longitude)) {
      $output[] = sprintf("\t<longitude>%s</longitude>", $this->longitude);
    }
    
    if (isset($this->latitude)) {
      $output[] = sprintf("\t<latitude>%s</latitude>", $this->latitude);
    }
    
    if (isset($this->altitude)) {
      $output[] = sprintf("\t<altitude>%s</altitude>", $this->altitude);
    }
    
    if (isset($this->heading)) {
      $output[] = sprintf("\t<heading>%s</heading>", $this->heading);
    }
    
    if (isset($this->tilt)) {
      $output[] = sprintf("\t<tilt>%s</tilt>", $this->tilt);
    }
    
    if (isset($this->range)) {
      $output[] = sprintf("\t<range>%s</range>", $this->range);
    }
    
    if (isset($this->altitudeMode)) {
      $output[] = $this->altitudeMode->__toString();
    }
    
    $output[] = "</LookAt>";
    
    return implode("\n", $output);
  }
  
  public function getLongitude() {
    return $this->longitude;
  }
  
  public function setLongitude($longitude) {
    $this->longitude = $longitude;
  }

  public function getLatitude() {
    return $this->latitude;
  }
  
  public function setLatitude($latitude) {
    $this->latitude = $latitude;
  }
  
  public function getAltitude() {
    return $this->altitude;
  }
  
  public function setAltitude($altitude) {
    $this->altitude = $altitude;
  }
  
  public function getHeading() {
    return $this->heading;
  }
  
  public function setHeading($heading) {
    $this->heading = $heading;
  }
  
  public function getTilt() {
    return $this->tilt;
  }
  
  public function setTilt($tilt) {
    $this->tilt = $tilt;
  }
  
  public function getRange() {
    return $this->range;
  }
  
  public function setRange($range) {
    $this->range = $range;
  }
  
  public function getAltitudeMode() {
    return $this->altitudeMode;
  }
  
  public function setAltitudeMode($altitudeMode) {
    $this->altitudeMode = $altitudeMode;
  }
  
}
?>