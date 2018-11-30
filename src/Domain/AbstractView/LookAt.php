<?php

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\KmlObjectVisitor;

/**
 * LookAt class.
 */
class LookAt extends AbstractView {

  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitLookAt($this);
  }

}
