<?php

namespace LibKml\Domain\Feature\Container;

use LibKml\Domain\KmlObjectVisitor;

/**
 * Document class.
 */
class Document extends Container {

  private $schemas = array();

  public function accept(KmlObjectVisitor $visitor) {
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
