<?php

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\Icon;
use LibKml\Domain\FieldType\Vec2;
use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * IconStyle class.
 */
class IconStyle extends ColorStyle {

  private $scale = 1;
  private $heading = 0;
  private $icon;
  private $hotSpot;

  public function __construct() {
    parent::__construct();
    $this->hotSpot = Vec2::fromValues(0.5, 0.5, 'fraction', 'fraction');
  }

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

  public function getIcon(): ?Icon {
    return $this->icon;
  }

  public function setIcon(?Icon $icon): void {
    $this->icon = $icon;
  }

  public function getHotSpot(): ?Vec2 {
    return $this->hotSpot;
  }

  public function setHotSpot(?Vec2 $hotSpot): void {
    $this->hotSpot = $hotSpot;
  }

}
