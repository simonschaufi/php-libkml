<?php

namespace LibKml\Domain\Feature\Container;

use LibKml\Domain\KmlObject;
use LibKml\Domain\KmlObjectVisitorInterface;

class Schema extends KmlObject {

  private $fields = [];

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitSchema($this);
  }

  public function addField($field) {
    $this->fields[] = $field;
  }

  public function clearFields() {
    $this->fields = [];
  }

  public function getFields() {
    return $this->fields;
  }

  public function setFields($fields): void {
    $this->fields = $fields;
  }

}
