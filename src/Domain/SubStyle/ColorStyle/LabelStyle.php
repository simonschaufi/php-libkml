<?php

namespace LibKML\Domain\SubStyle\ColorStyle;

/**
 * LabelStyle class.
 */
class LabelStyle extends ColorStyle {

  private $scale;

  /**
   *
   */
  public function getScale() {
    return $this->scale;
  }

  /**
   *
   */
  public function setScale($scale) {
    $this->scale = $scale;
  }

}
