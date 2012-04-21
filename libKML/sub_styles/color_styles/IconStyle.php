<?php
namespace libKML;

/**
 *  IconStyle class
 */

class IconStyle extends ColorStyle {
  
  private $scale;
  private $heading;
  private $icon;
  private $hotSpot;
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    $output[] = sprintf("<IconStyle%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    $output[] = $parent_string;
    
    if (isset($this->scale)) {
      $output[] = sprintf("\t<scale>%s</scale>", $this->scale);
    }
    
    if (isset($this->heading)) {
      $output[] = sprintf("\t<heading>%s</heading>", $this->heading);
    }
    
    if (isset($this->icon)) {
      $output[] = $this->icon->__toString();
    }
    
    if (isset($this->hotSpot)) {
      $output[] = sprintf("\t<hotSpot %s />", $this->hotSpot);
    }
    
    $output[] = "</IconStyle>";
    
    return implode("\n", $output);
  }
  
  public function getScale() {
    return $this->scale;
  }
  
  public function setScale($scale) {
    $this->scale = $scale;
  }
  
  public function getHeading() {
    return $this->heading;
  }
  
  public function setHeading($heading) {
    $this->heading = $heading;
  }
  
  public function getIcon() {
    return $this->icon;
  }
  
  public function setIcon($icon) {
    $this->icon = $icon;
  }
  
  public function getHotSpot() {
    return $this->hotSpot;
  }
  
  public function setHotSpot($hotSpot) {
    $this->hotSpot = $hotSpot;
  }
  
}

?>