<?php

namespace LibKml\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Feature;

/**
 * Overlay abstract class.
 */
abstract class Overlay extends Feature {

  protected $color;
  protected $drawOrder;
  protected $icon;

  public function getAllFeatures() {
    return array($this);
  }

  public function getColor() {
    return $this->color;
  }

  public function setColor($color) {
    $this->color = $color;
  }

  public function getDrawOrder() {
    return $this->drawOrder;
  }

  public function setDrawOrder($drawOrder) {
    $this->drawOrder = $drawOrder;
  }

  public function getIcon() {
    return $this->icon;
  }

  public function setIcon($icon) {
    $this->icon = $icon;
  }

}
