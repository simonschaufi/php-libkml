<?php

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * LookAt class.
 */
class LookAt extends AbstractView {

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitLookAt($this);
  }

}
