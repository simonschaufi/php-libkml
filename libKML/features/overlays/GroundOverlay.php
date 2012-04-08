<?php
namespace libKML;

/**
 *  GroundOverlay class
 */

class GroundOverlay extends Overlay {
  private $altitude;
  private $altitudeMode;
  private $latLonBox;
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    
    $output[] = sprintf("<GroundOverlay%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    $output[] = $parent_string;
    
    if (isset($this->altitude)) {
      $output[] = sprintf("\t<altitude>%f</altitude>", $this->altitude);
    }
    
    if (isset($this->altitudeMode)) {
      $output[] = $this->altitudeMode->__toString();
    }
    
    if (isset($this->latLonBox)) {
      $output[] = $this->latLonBox->__toString();
    }
    
    $output[] = "</GroundOverlay>";
    
    return implode("\n", $output);
  }
  
  public function toWKT() {
    return '';
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

?>