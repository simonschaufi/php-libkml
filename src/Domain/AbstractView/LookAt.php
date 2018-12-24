<?php

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * Defines a virtual camera that is associated with a Feature.
 */
class LookAt extends AbstractView {

  use View;

  private $range = 0;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitLookAt($this);
  }

  public function getRange(): float {
    return $this->range;
  }

  public function setRange(float $range): void {
    $this->range = $range;
  }

}
