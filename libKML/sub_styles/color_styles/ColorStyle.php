<?php
namespace libKML;

/**
 *  ColorStyle abstract class
 */

abstract class ColorStyle extends SubStyle {
  
  protected $color;
  protected $colorMode;
  
  public function __toString() {
    $output = array();
   
    if (isset($this->color)) {
      $output[] = sprintf("\t<color>%s</color>", $this->color);
    }
    
    if (isset($this->colorMode)) {
      $output[] = sprintf("\t<colorMode>%s</colorMode>", $this->colorMode->__toString());
    }
    
    return implode("\n", $output);
  }
  
  public function getColor() {
    return $this->color;
  }
  
  public function setColor($color) {
    $this->color = $color;
  }
  
  public function getColorMode() {
    return $this->colorMode;
  }
  
  public function setColorMode($colorMode) {
    $this->colorMode = $colorMode;
  }
  
}
?>