<?php
namespace libKML;

/**
 *  StyleMap class
 */

class StyleMap extends StyleSelector {
  
  private $pairs = array();
  
  public function addPair($pair) {
    $this->pairs[] = $pair;
  }
  
  public function clearPairs() {
    $this->pairs = array();
  }
  
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
  
  public function setPairs($pairs) {
    $this->pairs = $pairs;
  }
  
  public function getPairs() {
    return $this->pairs;
  }
}

?>