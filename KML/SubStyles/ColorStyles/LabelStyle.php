<?php
namespace KML\SubStyles\ColorStyles;

/**
 *  LabelStyle class
 */

require_once("ColorStyle.php");

class LabelStyle extends ColorStyle {
  
  private $scale;
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    $output[] = sprintf("<LabelStyle%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    $output[] = $parent_string;
    
    if (isset($this->scale)) {
      $output[] = sprintf("\t<scale>%s</scale>", $this->scale);
    }
    
    $output[] = "</LabelStyle>";
    
    return implode("\n", $output);
  }
  
  public function getScale() {
    return $this->scale;
  }
  
  public function setScale($scale) {
    $this->scale = $scale;
  }
  
}
?>