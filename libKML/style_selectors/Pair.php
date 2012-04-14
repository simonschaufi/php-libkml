<?php
namespace libKML;

/**
 *  Pair class
 */

class Pair extends KMLObject {
  
  private $key;
  private $styleUrl;
  
  public function __toString() {
    $output = array();
    $output[] = sprintf("<Pair%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    
    if (isset($this->key)) {
      $output[] = sprintf("\t<key>%s</key>", $this->key);
    }
    
    if (isset($this->styleUrl)) {
      $output[] = sprintf("\t<styleUrl>%s</styleUrl>", $this->styleUrl);
    }
    
    $output[] = "</Pair>";
    
    return implode("\n", $output);
  }
  
  public function getKey() {
    return $this->key;
  }
  
  public function setKey($key) {
    $this->key = $key;
  }
  
  public function getStyleUrl() {
    return $this->styleUrl;
  }
  
  public function setStyleUrl($styleUrl) {
    $this->styleUrl = $styleUrl;
  }
  
}
?>