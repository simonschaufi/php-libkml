<?php

namespace LibKML\Domain\SubStyle\ColorStyle;

/**
 * PolyStyle class.
 */
class PolyStyle extends ColorStyle {

  private $fill;
  private $outline;

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
