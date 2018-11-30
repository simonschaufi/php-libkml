<?php

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\KmlObjectVisitor;

/**
 * PolyStyle class.
 */
class PolyStyle extends ColorStyle {

  private $fill;
  private $outline;

  /**
   * @param \LibKml\Domain\KmlObjectVisitor $visitor
   */
  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitPolyStyle($this);
  }

  /**
   *
   */
  public function getFill() {
    return $this->fill;
  }

  /**
   *
   */
  public function setFill($fill) {
    $this->fill = $fill;
  }

  /**
   *
   */
  public function getOutline() {
    return $this->outline;
  }

  /**
   *
   */
  public function setOutline($outline) {
    $this->outline = $outline;
  }

}
