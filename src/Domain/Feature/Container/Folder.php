<?php

namespace LibKml\Domain\Feature\Container;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * Folder class.
 */
class Folder extends Container {

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitFolder($this);
  }

}
