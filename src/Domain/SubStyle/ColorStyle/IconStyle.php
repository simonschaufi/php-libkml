<?php

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\KmlObjectVisitor;

/**
 * IconStyle class.
 */
class IconStyle extends ColorStyle {

  private $scale;
  private $heading;
  private $icon;
  private $hotSpot;

  /**
   * @param \LibKml\Domain\KmlObjectVisitor $visitor
   */
  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitIconStyle($this);
  }

  /**
   *
   */
  public function getScale() {
    return $this->scale;
  }

  /**
   *
   */
  public function setScale($scale) {
    $this->scale = $scale;
  }

  /**
   *
   */
  public function getHeading() {
    return $this->heading;
  }

  /**
   *
   */
  public function setHeading($heading) {
    $this->heading = $heading;
  }

  /**
   *
   */
  public function getIcon() {
    return $this->icon;
  }

  /**
   *
   */
  public function setIcon($icon) {
    $this->icon = $icon;
  }

  /**
   *
   */
  public function getHotSpot() {
    return $this->hotSpot;
  }

  /**
   *
   */
  public function setHotSpot($hotSpot) {
    $this->hotSpot = $hotSpot;
  }

}
