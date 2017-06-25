<?php
namespace KML\Features\Overlays;

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
    return $this->latLonBox->toWKT();
  }
  
  public function toWKT2d() {
    return $this->latLonBox->toWKT2d();
  }
  
  public function toJSON() {
    $json_data = array();
    
    if (isset($this->latLonBox)) {
      $json_data = array('type' => 'Feature',
                         'geometry' => $this->latLonBox->toJSON());
    }

    return $json_data;
  }
  
  public function toExtGeoJSON() {
    $json_data = array();
    
    if (isset($this->latLonBox)) {
      $json_data = array('type' => 'Feature',
                         'geometry' => $this->latLonBox->toJSON());
    }

    return $json_data;
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