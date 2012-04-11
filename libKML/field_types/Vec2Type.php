<?php
namespace libKML;

/**
 *  Vec2Type class type
 */

class Vec2Type {
  private $x;
  private $y;
  private $xunits;
  private $yunits;
  
  public function __toString() {
    $output = array();
    
    if (isset($this->x)) {
      $output[] = sprintf("x=\"%s\"", $this->x);
    }
    
    if (isset($this->y)) {
      $output[] = sprintf("y=\"%s\"", $this->y);
    }
    
    if (isset($this->xunits)) {
      $output[] = sprintf("xunits=\"%s\"", $this->xunits);
    }
    
    if (isset($this->yunits)) {
      $output[] = sprintf("yunits=\"%s\"", $this->yunits);
    }
    
    return implode(" ", $output);
  }
  
  public function getX() {
    return $this->x;
  }
  
  public function setX($x) {
    $this->x = $x;
  }
  
  public function getY() {
    return $this->y;
  }
  
  public function setY($y) {
    $this->y = $y;
  }
  
  public function getXUnits() {
    return $this->xunits;
  }
  
  public function setXUnits($xunits) {
    $this->xunits = $xunits;
  }
  
  public function getYUnits() {
    return $this->yunits;
  }
  
  public function setYUnits($yunits) {
    $this->yunits = $yunits;
  }
}