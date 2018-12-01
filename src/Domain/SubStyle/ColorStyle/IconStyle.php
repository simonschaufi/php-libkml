<?php

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Icon;
use LibKml\Domain\FieldType\Vec2;
use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * IconStyle class.
 */
class IconStyle extends ColorStyle {

  private $scale;
  private $heading;
  private $icon;
  private $hotSpot;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitIconStyle($this);
  }

  public function getScale(): float {
    return $this->scale;
  }

  public function setScale(float $scale): void {
    $this->scale = $scale;
  }

  public function getHeading(): float {
    return $this->heading;
  }

  public function setHeading(float $heading): void {
    $this->heading = $heading;
  }

  public function getIcon(): Icon {
    return $this->icon;
  }

  public function setIcon(Icon $icon): void {
    $this->icon = $icon;
  }

  public function getHotSpot(): Vec2 {
    return $this->hotSpot;
  }

  public function setHotSpot(Vec2 $hotSpot): void {
    $this->hotSpot = $hotSpot;
  }

}
