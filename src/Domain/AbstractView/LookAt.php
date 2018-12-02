<?php

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * Defines a virtual camera that is associated with a Feature.
 */
class LookAt extends AbstractView {

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitLookAt($this);
  }

}
