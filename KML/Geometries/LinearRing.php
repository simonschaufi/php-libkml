<?php
namespace KML\Geometries;

/**
 *  LinearRing class
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
    $coordinates_strings = array();
    
    if (count($coordinates_strings)) {
      foreach($this->coordinates as $coordinate) {
        $coordinates_strings[] = $coordinate->toWKT();
      }
      
      $first_coordinate = $this->coordinates[0];
      $last_coordinate = end($this->coordinates);
      if ($first_coordinate != $last_coordinate) {
        $coordinates_strings[] = $first_coordinate->toWKT();
      }
    }
    
    return sprintf("LINESTRING(%s)", implode(", ", $coordinates_strings));
  }
  
  public function toWKT2d() {
    $coordinates_strings = array();
    
    if (count($coordinates_strings)) {
      foreach($this->coordinates as $coordinate) {
        $coordinates_strings[] = $coordinate->toWKT2d();
      }
      
      $first_coordinate = $this->coordinates[0];
      $last_coordinate = end($this->coordinates);
      if ($first_coordinate != $last_coordinate) {
        $coordinates_strings[] = $first_coordinate->toWKT2d();
      }
    }
    
    return sprintf("LINESTRING(%s)", implode(", ", $coordinates_strings));
  }
  
  public function toJSON() {
    $json_data = null;
    
    if (count($this->coordinates)) {
      $json_data = array('type' => 'LineString',
                         'coordinates' => array());
      
      foreach($this->coordinates as $coordinate) {
        $json_data['coordinates'][] = $coordinate->toJSON();
      }
      
      $first_coordinate = $this->coordinates[0];
      $last_coordinate = end($this->coordinates);
      if ($first_coordinate != $last_coordinate) {
        $json_data['coordinates'][] = $first_coordinate->toJSON();
      }
    }
    
    return $json_data;
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
    
    if (count($this->coordinates)) {
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
  
  public function setCoordinates(array $coordinates) {
    $this->coordinates = $coordinates;
  }
  
}