<?php
namespace KML\SubStyles;

use KML\FieldTypes\ItemIconState;
use KML\KMLObject;

class ItemIcon extends KMLObject
{
    private $href;
    /** @var  ItemIconState */
    private $state;
  
    public function __toString(): string
    {
        $output = [];
     
        $output[] = sprintf(
            "<ItemIcon%s>",
            isset($this->id)?sprintf(" id=\"%s\"", $this->id):""
        );
    
        if (isset($this->href)) {
            $output[] = sprintf("\t<href>%s</href>", $this->href);
        }
    
        if (isset($this->state)) {
            $output[] = sprintf("\t<state>%s</state>", $this->state->__toString());
        }
    
        $output[] = "</ItemIcon>";
    
        return implode("\n", $output);
    }
  
    public function getHref()
    {
        return $this->href;
    }
  
    public function setHref($href)
    {
        $this->href = $href;
    }
  
    public function getState(): ItemIconState
    {
        return $this->state;
    }
  
    public function setState(ItemIconState $state)
    {
        $this->state = $state;
    }
}
