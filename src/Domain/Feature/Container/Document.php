<?php

namespace LibKml\Domain\Feature\Container;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * Document class.
 */
class Document extends Container {

  private $schemas = [];

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitDocument($this);
  }

  public function addSchema($schema) {
    $this->schemas[] = $schema;
  }

  public function clearSchemas() {
    $this->schemas = array();
  }

  public function getSchemas() {
    return $this->schemas;
  }

  public function setSchemas($schemas) {
    $this->schemas = $schemas;
  }

}
