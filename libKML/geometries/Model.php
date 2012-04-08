<?php
namespace libKML;

/**
 *  Model class
 */

require_once("Geometry.php");

class Model extends Geometry {
  
  public $altitudeMode;
  public $location;
  public $orientation;
  public $scale;
  public $link;
  public $resourceMap;
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    $output[] = sprintf("<Model%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    $output[] = $parent_string;
    
    $output[] = "</Model>";
    
    return implode("\n", $output);
  }

}

?>