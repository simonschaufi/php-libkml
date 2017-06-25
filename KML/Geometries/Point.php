<?php
namespace KML\Geometries;

/**
 *  Point class
 */

class Point extends Geometry {
  
  private $extrude;
  private $altitudeMode;
  private $coordinates;
  
  public function toWKT() {
    $wtk_data =  '';
    
    if (isset($this->coordinates)) {
      $wtk_data = sprintf("POINT (%s)", $this->coordinates->toWKT());
    }
    
    return $wtk_data;
  }
  
  
  public function toWKT2d() {
    $wtk_data =  '';
    
    if (isset($this->coordinates)) {
      $wtk_data = sprintf("POINT (%s)", $this->coordinates->toWKT2d());
    }
    
    return $wtk_data;
  }
  
  public function toJSON() {
    $json_data = null;
    
    if (isset($this->coordinates)) {
      $json_data = array('type' => 'Point',
                         'coordinates' => $this->coordinates->toJSON());
    }
    
    return $json_data;
  }
  
  public function __toString() {
   
    $output = array();
    $output[] = sprintf("<Point%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    
    if (isset($this->extrude)) {
      $output[] = sprintf("\t<extrude>%d</extrude>", $this->extrude);
    }
    
    if (isset($this->altitudeMode)) {
      $output[] = sprintf("\t<altitudeMode>%s</altitudeMode>", $this->altitudeMode->__toString());
    }
    
    if (isset($this->coordinates)) {
      $output[] = sprintf("\t<coordinates>%s</coordinates>", $this->coordinates->__toString());
    }
    
    $output[] = "</Point>";
    
    return implode("\n", $output);
  }
  
  public function getExtrude() {
    return $this->extrude;
  }
  
  public function setExtrude($extrude) {
    $this->extrude = $extrude;
  }
  
  public function getAltitudeMode() {
    return $this->altitudeMode;
  }
  
  public function setAltitudeMode($altitudeMode) {
    $this->altitudeMode = $altitudeMode;
  }
  
  public function getCoordinates() {
    return $this->coordinates;
  }
  
  public function setCoordinates($coordinates) {
    $this->coordinates = $coordinates;
  }

}

?>