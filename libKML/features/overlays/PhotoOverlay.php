<?php
namespace libKML;

/**
 *  PhotoOverlay class
 */

require_once("Overlay.php");

class PhotoOverlay extends Overlay {
  public $rotation;
  public $viewVolume;
  public $imagePyramid;
  public $point;
  public $shape;
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    
    $output[] = sprintf("<PhotoOverlay%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    $output[] = $parent_string;
    
    
    $output[] = "</PhotoOverlay>";
    
    return implode("\n", $output);
  }
}

?>