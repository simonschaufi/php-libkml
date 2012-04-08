<?php
namespace libKML;

/**
 *  Pair class
 */

require_once("../KMLObject.php");

class Pair extends KMLObject {
  public $key;
  public $styleUrl;
  public $style;
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    $output[] = sprintf("<Pair%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    $output[] = $parent_string;
    
    $output[] = "</Pair>";
    
    return implode("\n", $output);
  }
}
?>