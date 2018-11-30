<?php

namespace LibKml\Domain\Geometry;

use LibKml\Domain\KmlObject;
use LibKml\Domain\KmlObjectVisitor;

/**
 * ResouceMap class.
 */
class ResourceMap extends KmlObject {

  private $aliases;

  /**
   * @param \LibKml\Domain\KmlObjectVisitor $visitor
   */
  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitResourceMap($this);
  }

  /**
   *
   */
  public function getAliases() {
    return $this->aliases;
  }

  /**
   *
   */
  public function setAliases($aliases) {
    $this->aliases = $aliases;
  }

}
