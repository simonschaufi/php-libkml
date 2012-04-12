<?php
namespace libKML;

/**
 *  MultiGeometry class
 */

require_once("Geometry.php");

class MultiGeometry extends Geometry {
  
  public $geometries;
  
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

}

?>