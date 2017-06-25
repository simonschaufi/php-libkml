<?php
namespace KML\SubStyles\ColorStyles;

use KML\FieldTypes\Vec2Type;
use KML\Icon;

class IconStyle extends ColorStyle
{
    private $scale;
    private $heading;
    /** @var  Icon */
    private $icon;
    /** @var  Vec2Type */
    private $hotSpot;
  
    public function __toString(): string
    {
        $parent_string = parent::__toString();
    
        $output = [];
        $output[] = sprintf(
            "<IconStyle%s>",
            isset($this->id)?sprintf(" id=\"%s\"", $this->id):""
        );
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
  
    public function getScale()
    {
        return $this->scale;
    }
  
    public function setScale($scale)
    {
        $this->scale = $scale;
    }
  
    public function getHeading()
    {
        return $this->heading;
    }
  
    public function setHeading($heading)
    {
        $this->heading = $heading;
    }
  
    public function getIcon(): Icon
    {
        return $this->icon;
    }
  
    public function setIcon(Icon $icon)
    {
        $this->icon = $icon;
    }
  
    public function getHotSpot(): Vec2Type
    {
        return $this->hotSpot;
    }
  
    public function setHotSpot(Vec2Type $hotSpot)
    {
        $this->hotSpot = $hotSpot;
    }
}
