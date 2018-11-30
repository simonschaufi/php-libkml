<?php

namespace LibKML\Domain\SubStyle\ColorStyle;

/**
 * LineStyle class.
 */
class LineStyle extends ColorStyle {

  private $width;

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
