<?php

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * Defines the virtual camera that views the scene.
 */
class Camera extends AbstractView {

  private $roll = 0;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitCamera($this);
  }

  public function getRoll(): float {
    return $this->roll;
  }

  public function setRoll(float $roll): void {
    $this->roll = $roll;
  }

}
