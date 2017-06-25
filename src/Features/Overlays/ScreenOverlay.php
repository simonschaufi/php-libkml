<?php
namespace KML\Features\Overlays;

/**
 *  ScreenOverlay class
 */

class ScreenOverlay extends Overlay
{
    private $rotation;
    private $overlayXY;
    private $screenXY;
    private $rotationXY;
    private $size;
  
    public function __toString()
    {
        $parent_string = parent::__toString();
    
        $output = [];
    
        $output[] = sprintf(
            "<ScreenOverlay%s>",
            isset($this->id)?sprintf(" id=\"%s\"", $this->id):""
        );
        $output[] = $parent_string;
    
        if (isset($this->rotation)) {
            $output[] = sprintf("\t<rotation>%s</rotation>", $this->rotation);
        }
    
        if (isset($this->overlayXY)) {
            $output[] = sprintf("\t<overlayXY %s />", (string)$this->overlayXY);
        }
    
        if (isset($this->screenXY)) {
            $output[] = sprintf("\t<screenXY %s />", (string)$this->screenXY);
        }
    
        if (isset($this->rotationXY)) {
            $output[] = sprintf("\t<rotationXY %s />", (string)$this->rotationXY);
        }
    
        if (isset($this->size)) {
            $output[] = sprintf("\t<size %s />", (string)   $this->size);
        }
    
        $output[] = "</ScreenOverlay>";
    
        return implode("\n", $output);
    }
  
    public function toWKT()
    {
        return '';
    }
  
    public function toWKT2d()
    {
        return '';
    }
  
    public function toJSON()
    {
        return null;
    }
  
    public function toExtGeoJSON()
    {
        return null;
    }
  
    public function getRotation()
    {
        return $this->rotation;
    }
  
    public function setRotation($rotation)
    {
        $this->rotation = $rotation;
    }
  
    public function getOverlayXY()
    {
        return $this->overlayXY;
    }
  
    public function setOverlayXY($overlayXY)
    {
        $this->overlayXY = $overlayXY;
    }
  
    public function getScreenXY()
    {
        return $this->screenXY;
    }
  
    public function setScreenXY($screenXY)
    {
        $this->screenXY = $screenXY;
    }
  
    public function getRotationXY()
    {
        return $this->rotationXY;
    }
  
    public function setRotationXY($rotationXY)
    {
        $this->rotationXY = $rotationXY;
    }
  
    public function getSize()
    {
        return $this->size;
    }
  
    public function setSize($size)
    {
        $this->size = $size;
    }
}
