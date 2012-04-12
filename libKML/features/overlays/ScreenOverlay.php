<?php
namespace libKML;

/**
 *  ScreenOverlay class
 */

require_once("Overlay.php");

class ScreenOverlay extends Overlay {
  private $rotation;
  private $overlayXY;
  private $screenXY;
  private $rotationXY;
  private $size;  
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    
    $output[] = sprintf("<ScreenOverlay%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    $output[] = $parent_string;
    
    if (isset($this->rotation)) {
      $output[] = sprintf("\t<rotation>%f</rotation>", $this->rotation);
      
    }
    
    $output[] = "</ScreenOverlay>";
    
    return implode("\n", $output);
  }
  
  public function toWKT() {
    return '';
  }
  
  public function getRotation() {
    return $this->rotation;
  }
  
  public function setRotation($rotation) {
    $this->rotation = $rotation;
  }
  
  public function getOverlayXY() {
    return $this->overlayXY;
  }
  
  public function setOverlayXY($overlayXY) {
    $this->overlayXY = $overlayXY;
  }
  
  public function getScreenXY() {
    return $this->screenXY;
  }
  
  public function setScreenXY($screenXY) {
    $this->screenXY = $screenXY;
  }
  
  public function getRotationXY() {
    return $this->rotationXY;
  }
  
  public function setRotationXY($rotationXY) {
    $this->rotationXY = $rotationXY;
  }
  
  public function getSize() {
    return $this->size;
  }
  
  public function setSize($size) {
    $this->size = $size;
  }
  
}

?>