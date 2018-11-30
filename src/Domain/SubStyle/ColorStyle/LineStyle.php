<?php

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\KmlObjectVisitor;

/**
 * LineStyle class.
 */
class LineStyle extends ColorStyle {

  private $width;

  /**
   * @param KmlObjectVisitor $visitor
   */
  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitLineStyle($this);
  }

  /**
   *
   */
  public function getWidth() {
    return $this->width;
  }

  /**
   *
   */
  public function setWidth($width) {
    $this->width = $width;
  }

}
