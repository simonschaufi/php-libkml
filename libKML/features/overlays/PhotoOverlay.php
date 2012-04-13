<?php
namespace libKML;

/**
 *  PhotoOverlay class
 */

require_once("Overlay.php");

class PhotoOverlay extends Overlay {
  private $rotation;
  private $viewVolume;
  private $imagePyramid;
  private $point;
  private $shape;
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    
    $output[] = sprintf("<PhotoOverlay%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    $output[] = $parent_string;
    
    
    $output[] = "</PhotoOverlay>";
    
    return implode("\n", $output);
  }
  
  public function toWKT() {
    return '';
  }
  
  public function toWKT2d() {
    return '';
  }
  
  public function toJSON() {
    return array();
  }
  
  public function toExtGeoJSON() {
    return array();
  }
  
  public function setRotation($rotation) {
    $this->rotation = $rotation;
  }
  
  public function getRotation() {
    return $this->rotation;
  }
  
  public function setViewVolume($viewVolume) {
    $this->viewVolume = $viewVolume;
  }
  
  public function getViewVolume() {
    return $this->viewVolume;
  }
  
  public function setImagePyramid($imagePyramid) {
    $this->imagePyramid = $imagePyramid;
  }
  
  public function getImagePyramid() {
    return $this->imagePyramid;
  }
  
  public function setPoint($point) {
    $this->point = $point;
  }
  
  public function getPoint() {
    return $this->point;
  }
  
  public function setShape($shape) {
    $this->shape = $shape;
  }
  
  public function getShape() {
    return $this->shape;
  }
  
}

?>