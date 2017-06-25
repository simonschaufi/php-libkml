<?php
namespace KML\Features\Overlays;

use KML\FieldTypes\Vec2Type;

class ScreenOverlay extends Overlay
{
    private $rotation;
    /** @var  Vec2Type */
    private $overlayXY;
    /** @var  Vec2Type */
    private $screenXY;
    /** @var  Vec2Type */
    private $rotationXY;
    /** @var  Vec2Type */
    private $size;
  
    public function __toString(): string
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
  
    public function getOverlayXY(): Vec2Type
    {
        return $this->overlayXY;
    }
  
    public function setOverlayXY(Vec2Type $overlayXY)
    {
        $this->overlayXY = $overlayXY;
    }
  
    public function getScreenXY(): Vec2Type
    {
        return $this->screenXY;
    }
  
    public function setScreenXY(Vec2Type $screenXY)
    {
        $this->screenXY = $screenXY;
    }
  
    public function getRotationXY(): Vec2Type
    {
        return $this->rotationXY;
    }
  
    public function setRotationXY(Vec2Type $rotationXY)
    {
        $this->rotationXY = $rotationXY;
    }
  
    public function getSize(): Vec2Type
    {
        return $this->size;
    }
  
    public function setSize(Vec2Type $size)
    {
        $this->size = $size;
    }
}
