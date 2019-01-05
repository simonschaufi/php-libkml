<?php

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * LineStyle class.
 */
class LineStyle extends ColorStyle {

  private $width = 1;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitLineStyle($this);
  }

  public function getWidth(): float {
    return $this->width;
  }

  public function setWidth(float $width): void {
    $this->width = $width;
  }

}
