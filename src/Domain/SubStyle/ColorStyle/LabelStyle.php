<?php

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\KmlObjectVisitor;

/**
 * LabelStyle class.
 */
class LabelStyle extends ColorStyle {

  private $scale;

  /**
   * @param \LibKml\Domain\KmlObjectVisitor $visitor
   */
  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitLabelStyle($this);
  }

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
