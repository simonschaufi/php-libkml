<?php
namespace libKML;

/**
 *  MultiGeometry class
 */ 

class MultiGeometry extends Geometry {
  
  private $geometries = array();
  
  public function addGeometry($geometry) {
    $this->geometries[] = $geometry;
  }
  
  public function clearGeometries() {
    $this->geometries = array();
  }
  
  public function toJSON() {
    $geometries = array();
    
    foreach($this->geometries as $geometry) {
      $geometries = array_merge($geometries, $geometry->toJSON());
    }
    
    return $geometries;
  }
  
  public function toWKT() {
    $geometries = array();
    
    foreach($this->geometries as $geometry) {
      $geometries[] = $geometry->toWTK();
    }
    
    return sprintf("GEOMETRYCOLLECTION(%s)", implode(",", $geometries));
  }
  
  public function toWKT2d() {
    $geometries = array();
    
    foreach($this->geometries as $geometry) {
      $geometries[] = $geometry->toWKT2d();
    }
    
    return sprintf("GEOMETRYCOLLECTION(%s)", implode(",", $geometries));
  }
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    $output[] = sprintf("<MultiGeometry%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    $output[] = $parent_string;
    
    if (isset($this->geometries) && is_array($this->geometries)) {
      $geometries_strings = array();
      foreach($this->geometries as $geometry) {
        $geometries_strings[] = $geometry->__toString();
      }
      
      $output[] = sprintf("\t<coordinates>%s</coordinates>", implode(" ", $geometries_strings));
    }
    
    $output[] = "</MultiGeometry>";
    
    return implode("\n", $output);
  }
  
  public function getGeometries() {
    return $this->geometries;
  }
  
  public function setGeometries($geometries) {
    $this->geometries = $geometries;
  }

}

?>