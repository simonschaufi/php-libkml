<?php
namespace libKML;

/**
 *  Placemark abstract class
 */

class Placemark extends Feature {
  
  private $geometry;
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    
    $output[] = sprintf("<Placemark%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    $output[] = $parent_string;
    
    if (isset($this->geometry)) {
      $output[] = $this->geometry->__toString();
    }
    
    $output[] = "</Placemark>";
    
    return implode("\n", $output);
  }
  
  public function getAllFeatures() {
    return array($this);
  }
  
  public function toWKT() {
    if (isset($this->geometry)) {
      return $this->geometry->toWKT();
    } else {
      return '';
    }
  }
  
  public function toWKT2d() {
    if (isset($this->geometry)) {
      return $this->geometry->toWKT2d();
    } else {
      return '';
    }
  }
  
  public function toJSON() {
    $json_data = array();
    
    if (isset($this->geometry)) {
      $json_data = array('type' => 'Feature',
                         'geometry' => $this->geometry->toJSON());
    }

    return $json_data;
  }
  
  public function setGeometry($geometry) {
    $this->geometry = $geometry;
  }
  
  public function getGeometry() {
    return $this->geometry;
  }
  
}

?>