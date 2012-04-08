<?php
namespace libKML;

/**
 *  Region class
 */
 
class Region extends KMLObject {
  
  private $latLonAltBox;
  private $lod;
  
  public function __toString() {
    $output = array();
    
    if (isset($this->latLonAltBox)) {
      $output[] = sprintf("<Region%s>",
                          isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
      
      $output[] = $this->latLonAltBox->__toString();
      
      if (isset($this->lod)) {
        $output[] = $this->lod->__toString();
      }
       
      $output[] = '</Region>';
    }
    
    return implode("\n", $output);
  }
  
  public function setLatLonAltBox($latLonAltBox) {
    $this->latLonAltBox = $latLonAltBox;
  }
  
  public function getLatLonAltBox() {
    return $this->latLonAltBox;
  }
  
  public function setLod($lod) {
    $this->lod = $lod;
  }
  
  public function getLod() {
    return $this->lod;
  }
  
}

?>