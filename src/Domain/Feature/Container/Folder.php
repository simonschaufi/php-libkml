<?php

namespace LibKml\Domain\Feature\Container;

use LibKml\Domain\KmlObjectVisitor;

/**
 * Folder class.
 */
class Folder extends Container {

  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitFolder($this);
  }

}
