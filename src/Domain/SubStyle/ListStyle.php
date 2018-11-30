<?php

namespace LibKml\Domain\SubStyle;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * ListStyle class.
 */
class ListStyle extends SubStyle {

  private $listItemType;
  private $bgColor;
  private $itemIcons = array();
  private $maxSnippetLines;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitListStyle($this);
  }

  public function addItemIcon($itemIcon) {
    $this->itemIcons[] = $itemIcon;
  }

  public function clearItemIcons() {
    $this->itemIcons = array();
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

  public function getMaxSnippetLines() {
    return $this->maxSnippetLines;
  }

  public function setMaxSnippetLines($maxSnippetLines) {
    $this->maxSnippetLines = $maxSnippetLines;
  }

}
