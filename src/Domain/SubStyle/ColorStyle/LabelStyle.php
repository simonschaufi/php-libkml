<?php

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * LabelStyle class.
 */
class LabelStyle extends ColorStyle {

  private $scale = 1;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitLabelStyle($this);
  }

  public function getScale(): float {
    return $this->scale;
  }

  public function setScale(float $scale): void {
    $this->scale = $scale;
  }

}
