<?php
namespace libKML;

/**
 *  ListStyle class
 */

class ListStyle extends SubStyle {
  private $listItemType;
  private $bgColor;
  private $itemIcons = array();
  
  public function addItemIcon($itemIcon) {
    $this->itemIcons[] = $itemIcon;
  }
  
  public function clearItemIcons() {
    $this->itemIcons = array();
  }
  
  public function __toString() {
    $parent_string = parent::__toString();
    
    $output = array();
    $output[] = sprintf("<ListStyle%s>",
                        isset($this->id)?sprintf(" id=\"%s\"", $this->id):"");
    $output[] = $parent_string;
    
    if (isset($this->listItemType)) {
      $output[] = sprintf("<listItemType>%s</listItemType>", $this->listItemType->__toString());
    }
    
    if (isset($this->bgColor)) {
      $output[] = sprintf("<bgColor>%s</bgColor>", $this->bgColor);
    }
    
    if ($count($this->itemIcons)) {
      foreach($this->itemIcons as $itemIcon) {
        $output[] = $itemIcon->__toString();
      }
    }
    
    $output[] = "</ListStyle>";
    
    return implode("\n", $output);
  }
  
  public function getListItemType() {
    return $this->listItemType;
  }
  
  public function setListItemType($listItemType) {
    $this->listItemType = $listItemType;
  }
  
  public function getBgColor() {
    return $this->bgColor;
  }
  
  public function setBgColor($bgColor) {
    $this->bgColor = $bgColor;
  }
  
  public function getItemIcons() {
    return $this->itemIcons;
  }
  
  public function setItemIcons($itemIcons) {
    $this->itemIcons = $itemIcons;
  }
}
?>