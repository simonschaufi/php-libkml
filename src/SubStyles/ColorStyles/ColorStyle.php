<?php
namespace KML\SubStyles\ColorStyles;

use KML\FieldTypes\ColorMode;
use KML\SubStyles\SubStyle;

abstract class ColorStyle extends SubStyle
{
    protected $color;
    /** @var  ColorMode */
    protected $colorMode;
  
    public function __toString(): string
    {
        $output = [];
   
        if (isset($this->color)) {
            $output[] = sprintf("\t<color>%s</color>", $this->color);
        }
    
        if (isset($this->colorMode)) {
            $output[] = sprintf("\t<colorMode>%s</colorMode>", $this->colorMode->__toString());
        }
    
        return implode("\n", $output);
    }
  
    public function getColor()
    {
        return $this->color;
    }
  
    public function setColor($color)
    {
        $this->color = $color;
    }
  
    public function getColorMode(): ColorMode
    {
        return $this->colorMode;
    }
  
    public function setColorMode(ColorMode $colorMode)
    {
        $this->colorMode = $colorMode;
    }
}
