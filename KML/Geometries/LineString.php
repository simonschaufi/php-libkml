<?php
namespace KML\Geometries;

/**
 *  LineString class
 */

class LineString extends Geometry {
  
  private $extrude;
  private $tessellate;
  private $altitudeMode;
  private $coordinates = array();
  
  public function toWKT() {
    
    if (count($this->coordinates)) {
      $coordinates_strings = array();
      
      foreach($this->coordinates as $coordinate) {
        $coordinates_strings[] = $coordinate->toWKT();
      }
      
      return sprintf("LINESTRING (%s)", implode(", ", $coordinates_strings));
    }
    
    return "";
  }
  
  public function toWKT2d() {
    
    if (count($this->coordinates)) {
      $coordinates_strings = array();
      
      foreach($this->coordinates as $coordinate) {
        $coordinates_strings[] = $coordinate->toWKT2d();
      }
      
      return sprintf("LINESTRING (%s)", implode(", ", $coordinates_strings));
    }
    
    return "";
  }
  
  public function addCoordinate($coordinate) {
    $this->coordinates[] = $coordinate;
  }
  
  public function clearCoordinates() {
    $this->coordinates = array();
  }
  
  public function toJSON() {
    $json_data = null;
    
    if (count($this->coordinates)) {
      $json_data = array('type' => 'LineString',
                         'coordinates' => array());
      
      foreach($this->coordinates as $coordinate) {
        $json_data['coordinates'][] = $coordinate->toJSON();
      }
    }
    
    return $json_data;
  }
  
  public function __toString() {    
    $output = array();
    $output[] = sprintf("<LineString%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    
    if (isset($this->extrude)) {
      $output[] = sprintf("\t<extrude>%d</extrude>", $this->extrude);
    }
    
    if (isset($this->tessellate)) {
      $output[] = sprintf("\t<tessellate>%d</tessellate>", $this->tessellate);
    }
    
    if (isset($this->altitudeMode)) {
      $output[] = sprintf("\t<altitudeMode>%s</altitudeMode>", $this->altitudeMode);
    }
    
    if (count($this->coordinates)) {
      $coordinates_strings = array();
      foreach($this->coordinates as $coordinate) {
        $coordinates_strings[] = $coordinate->__toString();
      }
      
      $output[] = sprintf("\t<coordinates>%s</coordinates>", implode(" ", $coordinates_strings));
    }
    
    $output[] = "</LineString>";
    
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

?>