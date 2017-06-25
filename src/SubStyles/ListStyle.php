<?php
namespace KML\SubStyles;

/**
 *  ListStyle class
 */

class ListStyle extends SubStyle
{
    private $listItemType;
    private $bgColor;
    private $itemIcons = [];
    private $maxSnippetLines;
  
  
    public function addItemIcon($itemIcon)
    {
        $this->itemIcons[] = $itemIcon;
    }
  
    public function clearItemIcons()
    {
        $this->itemIcons = [];
    }
  
    public function __toString()
    {
        $output = [];
        $output[] = sprintf(
            "<ListStyle%s>",
            isset($this->id)?sprintf(" id=\"%s\"", $this->id):""
        );
    
        if (isset($this->listItemType)) {
            $output[] = sprintf("<listItemType>%s</listItemType>", $this->listItemType->__toString());
        }
    
        if (isset($this->bgColor)) {
            $output[] = sprintf("<bgColor>%s</bgColor>", $this->bgColor);
        }
    
        if (isset($this->maxSnippetLines)) {
            $output[] = sprintf("<maxSnippetLines>%s</maxSnippetLines>", $this->maxSnippetLines);
        }
    
        if (count($this->itemIcons)) {
            foreach ($this->itemIcons as $itemIcon) {
                $output[] = $itemIcon->__toString();
            }
        }
    
        $output[] = "</ListStyle>";
    
        return implode("\n", $output);
    }
  
    public function getListItemType()
    {
        return $this->listItemType;
    }
  
    public function setListItemType($listItemType)
    {
        $this->listItemType = $listItemType;
    }
  
    public function getBgColor()
    {
        return $this->bgColor;
    }
  
    public function setBgColor($bgColor)
    {
        $this->bgColor = $bgColor;
    }
  
    public function getItemIcons()
    {
        return $this->itemIcons;
    }
  
    public function setItemIcons($itemIcons)
    {
        $this->itemIcons = $itemIcons;
    }
  
    public function setMaxSnippetLines($maxSnippetLines)
    {
        $this->maxSnippetLines = $maxSnippetLines;
    }
  
    public function getMaxSnippetLines()
    {
        return $this->maxSnippetLines;
    }
}
