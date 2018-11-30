<?php

namespace LibKml\Domain\Feature\Container;

use LibKml\Domain\KmlObjectVisitor;

/**
 * Folder class.
 */
class Folder extends Container {

  /**
   * @param KmlObjectVisitor $visitor
   */
  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitFolder($this);
  }

}
