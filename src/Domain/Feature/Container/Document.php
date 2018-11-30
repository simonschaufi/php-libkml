<?php

namespace LibKML\Domain\Feature\Container;

/**
 * Document class.
 */
class Document extends Container {

  private $schemas = array();

  /**
   *
   */
  public function addSchema($schema) {
    $this->schemas[] = $schema;
  }

  /**
   *
   */
  public function clearSchemas() {
    $this->schemas = array();
  }

  /**
   *
   */
  public function getSchemas() {
    return $this->schemas;
  }

  /**
   *
   */
  public function setSchemas($schemas) {
    $this->schemas = $schemas;
  }

}
