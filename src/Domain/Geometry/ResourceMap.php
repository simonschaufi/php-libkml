<?php

namespace LibKML\Domain\Geometry;

use LibKML\Domain\KMLObject;

/**
 * ResouceMap class.
 */
class ResourceMap extends KMLObject {

  private $aliases;

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
