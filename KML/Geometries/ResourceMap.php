<?php
namespace KML\Geometries;

use KML\KMLObject;

/**
 *  ResouceMap class
 */

class ResourceMap extends KMLObject {
  private $aliases;
  
  public function getAliases() {
    return $this->aliases;
  }
  
  public function setAliases($aliases) {
    $this->aliases = $aliases;
  }
  
}

?>