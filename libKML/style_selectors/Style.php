<?php
namespace libKML;

/**
 *  Style class
 */

class Style extends StyleSelector {
  
  private $iconStyle;
  private $labelStyle;
  private $lineStyle;
  private $polyStyle;
  private $balloonStyle;
  private $listStyle;
  
  public function __toString() {    
    $output = array();
    $output[] = sprintf("<Style%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    
    if (isset($this->iconStyle)) {
      $output[] = $this->iconStyle->__toString();
    }
    
    if (isset($this->labelStyle)) {
      $output[] = $this->labelStyle->__toString();
    }
    
    if (isset($this->lineStyle)) {
      $output[] = $this->lineStyle->__toString();
    }
    
    if (isset($this->polyStyle)) {
      $output[] = $this->polyStyle->__toString();
    }
    
    if (isset($this->balloonStyle)) {
      $output[] = $this->balloonStyle->__toString();
    }
    
    if (isset($this->listStyle)) {
      $output[] = $this->listStyle->__toString();
    }
    
    $output[] = "</Style>";
    
    return implode("\n", $output);
  }
  
  public function getIconStyle() {
    return $this->iconStyle;
  }
  
  public function setIconStyle($iconStyle) {
    $this->iconStyle = $iconStyle;
  }
  
  public function getLabelStyle() {
    return $this->labelStyle;
  }
  
  public function setLabelStyle($labelStyle) {
    $this->labelStyle = $labelStyle;
  }
  
  public function getLineStyle() {
    return $this->lineStyle;
  }
  
  public function setLineStyle($lineStyle) {
    $this->lineStyle = $lineStyle;
  }
  
  public function getPolyStyle() {
    return $this->polyStyle;
  }
  
  public function setPolyStyle($polyStyle) {
    $this->polyStyle = $polyStyle;
  }
  
  public function getBalloonStyle() {
    return $this->balloonStyle;
  }
  
  public function setBalloonStyle($balloonStyle) {
    $this->balloonStyle = $balloonStyle;
  }
  
  public function getListStyle() {
    return $this->listStyle;
  }
  
  public function setListStyle($listStyle) {
    $this->listStyle = $listStyle;
  }
  
}

?>