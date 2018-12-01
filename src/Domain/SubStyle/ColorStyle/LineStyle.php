<?php

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * LineStyle class.
 */
class LineStyle extends ColorStyle {

  private $width;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitLineStyle($this);
  }

  public function getWidth(): int {
    return $this->width;
  }

  public function setWidth(int $width): void {
    $this->width = $width;
  }

}
