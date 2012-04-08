<?php
namespace libKML;

/**
 *  StyleMap class
 */

require_once("StyleSelector.php");

class StyleMap extends StyleSelector {
  
  public $pairs = array();
  
  public function __toString() {    
    $output = array();
    $output[] = sprintf("<StyleMap%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    
    foreach($this->pairs as $pair) {
      $output[] = $pair->__toString();
    }
    
    $output[] = "</StyleMap>";
    
    return implode("\n", $output);
  }
}

?>