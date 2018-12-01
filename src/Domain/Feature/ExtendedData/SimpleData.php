<?php

namespace LibKml\Domain\Feature\ExtendedData;

class SimpleData {

  private $name;
  private $value;

  public function getName() {
    return $this->name;
  }

  public function setName($name): void {
    $this->name = $name;
  }

  public function getValue() {
    return $this->value;
  }

  public function setValue($value): void {
    $this->value = $value;
  }

}
