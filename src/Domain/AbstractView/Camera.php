<?php

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * Defines the virtual camera that views the scene.
 */
class Camera extends AbstractView {

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitCamera($this);
  }

}
