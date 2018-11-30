<?php

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\KmlObjectVisitor;

/**
 * Defines the virtual camera that views the scene.
 */
class Camera extends AbstractView {

  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitCamera($this);
  }

}
