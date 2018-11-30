<?php

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\SubStyle\SubStyle;

/**
 * ColorStyle abstract class.
 */
abstract class ColorStyle extends SubStyle {

  protected $color;
  protected $colorMode;

  /**
   *
   */
  public function getColor() {
    return $this->color;
  }

  /**
   *
   */
  public function setColor($color) {
    $this->color = $color;
  }

  /**
   *
   */
  public function getColorMode() {
    return $this->colorMode;
  }

  /**
   *
   */
  public function setColorMode($colorMode) {
    $this->colorMode = $colorMode;
  }

}
