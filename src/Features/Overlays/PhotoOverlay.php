<?php
namespace KML\Features\Overlays;

use KML\Geometries\Point;

class PhotoOverlay extends Overlay
{
    private $rotation;
    private $viewVolume;
    private $imagePyramid;
    /** @var  Point */
    private $point;
    private $shape;
  
    public function __toString(): string
    {
        $parent_string = parent::__toString();
    
        $output = [];
    
        $output[] = sprintf(
            "<PhotoOverlay%s>",
            isset($this->id)?sprintf(" id=\"%s\"", $this->id):""
        );
        $output[] = $parent_string;
    
    
        $output[] = "</PhotoOverlay>";
    
        return implode("\n", $output);
    }
  
    public function toWKT(): string
    {
        return '';
    }
  
    public function toWKT2d(): string
    {
        return '';
    }
  
    public function jsonSerialize()
    {
        return [];
    }
  
    public function toExtGeoJSON()
    {
        return [];
    }
  
    public function setRotation($rotation)
    {
        $this->rotation = $rotation;
    }
  
    public function getRotation()
    {
        return $this->rotation;
    }
  
    public function setViewVolume($viewVolume)
    {
        $this->viewVolume = $viewVolume;
    }
  
    public function getViewVolume()
    {
        return $this->viewVolume;
    }
  
    public function setImagePyramid($imagePyramid)
    {
        $this->imagePyramid = $imagePyramid;
    }
  
    public function getImagePyramid()
    {
        return $this->imagePyramid;
    }
  
    public function setPoint(Point $point)
    {
        $this->point = $point;
    }
  
    public function getPoint(): Point
    {
        return $this->point;
    }
  
    public function setShape($shape)
    {
        $this->shape = $shape;
    }
  
    public function getShape()
    {
        return $this->shape;
    }
}
