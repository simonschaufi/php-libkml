<?php
namespace libKML;

/**
 *  LineString class
 */

class LinearRing extends Geometry {
  
  private $extrude;
  private $tessellate;
  private $altitudeMode;
  private $coordinates = array();
  
  public function addCoordinate($coordinate) {
    $this->coordinates[] = $coordinate;
  }
  
  public function clearCoordinates() {
    $this->coordinates = array();
  }
  
  public function toWKT() {
    
  }
  
  public function toJSON() {
    
  }
  
  public function __toString() {
    $output = array();
    $output[] = sprintf("<LinearRing%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    
    if (isset($this->extrude)) {
      $output[] = sprintf("\t<extrude>%i</extrude>", $this->extrude);
    }
    
    if (isset($this->altitudeMode)) {
      $output[] = sprintf("\t<altitudeMode>%s</altitudeMode>", $this->altitudeMode);
    }
    
    if (isset($this->coordinates) && is_array($this->coordinates)) {
      $coordinates_strings = array();
      foreach($this->coordinates as $coordinate) {
        $coordinates_strings[] = $coordinate->__toString();
      }
      
      $output[] = sprintf("\t<coordinates>%s</coordinates>", implode(" ", $coordinates_strings));
    }
    
    $output[] = "</LinearRing>";
    
    return implode("\n", $output);
  }
  
  public function getExtrude() {
    return $this->extrude;
  }
  
  public function setExtrude($extrude) {
    $this->extrude = $extrude;
  }
  
  public function getTessellate() {
    return $this->tessellate;
  }
  
  public function setTessellate($tessellate) {
    $this->tessellate = $tessellate;
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