<?php
namespace KML;

use KML\Features\Lod;

class Region extends KMLObject
{
    private $latLonAltBox;
    /** @var  Lod */
    private $lod;
  
    public function __toString(): string
    {
        $output = [];
    
        if (isset($this->latLonAltBox)) {
            $output[] = sprintf(
                "<Region%s>",
                isset($this->id)?sprintf(" id=\"%s\"", $this->id):""
            );
      
            $output[] = (string)$this->latLonAltBox;
      
            if (isset($this->lod)) {
                $output[] = $this->lod->__toString();
            }
       
            $output[] = '</Region>';
        }
    
        return implode("\n", $output);
    }
  
    public function setLatLonAltBox($latLonAltBox)
    {
        $this->latLonAltBox = $latLonAltBox;
    }
  
    public function getLatLonAltBox()
    {
        return $this->latLonAltBox;
    }
  
    public function setLod(Lod $lod)
    {
        $this->lod = $lod;
    }
  
    public function getLod(): Lod
    {
        return $this->lod;
    }
}
