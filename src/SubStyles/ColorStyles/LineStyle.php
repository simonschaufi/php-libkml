<?php
namespace KML\SubStyles\ColorStyles;

/**
 *  LineStyle class
 */

class LineStyle extends ColorStyle
{
    private $width;
  
    public function __toString()
    {
        $parent_string = parent::__toString();
    
        $output = [];
        $output[] = sprintf(
            "<LineStyle%s>",
            isset($this->id)?sprintf(" id=\"%s\"", $this->id):""
        );
        $output[] = $parent_string;
    
        if (isset($this->width)) {
            $output[] = sprintf("\t<width>%s</width>", $this->width);
        }
    
        $output[] = "</LineStyle>";
    
        return implode("\n", $output);
    }
  
    public function setWidth($width)
    {
        $this->width = $width;
    }
  
    public function getWidth()
    {
        return $this->width;
    }
}
