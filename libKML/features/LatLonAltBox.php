<?php
namespace libKML;

/**
 *  LatLonAltBox class
 */

class LanLonAltBox extends KMLObject {
  
  private $altitudeMode;
  private $minAltitude;
  private $maxAltitude;
  private $north;
  private $south;
  private $east;
  private $west;
  
  public function __toString() {
    $output = array();
    
    if (isset($north, $south, $east, $west)) {
      $output[] = '<LanLonAltBox>';
      
      $output[] = sprintf("\t<north>%f</north>", $this->north);
      $output[] = sprintf("\t<south>%f</south>", $this->south);
      $output[] = sprintf("\t<east>%f</east>", $this->east);
      $output[] = sprintf("\t<west>%f</west>", $this->west);
      
      if (isset($this->altitudeMode)) {
        $output[] = $this->altitudeMode->__toString();
      }
      
      if (isset($this->maxAltitude)) {
        $output[] = sprintf("\t<maxAltitude>%f</maxAltitude>", $this->maxAltitude);
      }
      
      if (isset($this->minAltitude)) {
        $output[] = sprintf("\t<minAltitude>%f</minAltitude>", $this->minAltitude);
      }
      
      $output[] = '</LanLonAltBox>';
    }
    
    return implode("\n", $output);
  }
  
  public function getAltitudeMode() {
    return $this->altitudeMode;
  }
  
  public function setAltitudeMode($altitudeMode) {
    $this->altitudeMode = $altitudeMode;
  }
  
  public function getMinAltitude() {
    return $this->minAltitude;
  }
  
  public function setMinAltitude($minAltitude) {
    $this->minAltitude = $minAltitude;
  }
  
  public function getMaxAltitude() {
    return $this->maxAltitude;
  }
  
  public function setMaxAltitude($altitudeMode) {
    $this->maxAltitude = $maxAltitude;
  }
  
  public function getNorth() {
    return $this->north;
  }
  
  public function setNorth($north) {
    $this->north = $north;
  }
  
  public function getSouth() {
    return $this->south;
  }
  
  public function setSouth($south) {
    $this->south = $south;
  }

  public function getEast() {
    return $this->east;
  }
  
  public function setEast($east) {
    $this->east = $east;
  }
  
  public function getWest() {
    return $this->west;
  }
  
  public function setWest($west) {
    $this->west = $west;
  }
  
}

?>