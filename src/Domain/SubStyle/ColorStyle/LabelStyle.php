<?php

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * LabelStyle class.
 */
class LabelStyle extends ColorStyle {

  private $scale;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitLabelStyle($this);
  }

  public function getScale() {
    return $this->scale;
  }

  public function setScale($scale) {
    $this->scale = $scale;
  }

}
