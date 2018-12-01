<?php

namespace LibKml\Domain\Feature\ExtendedData;

class Other {

  private $namespace;
  private $name;
  private $value;

  public function getNamespace(): string {
    return $this->namespace;
  }

  public function setNamespace(string $namespace): void {
    $this->namespace = $namespace;
  }

  public function getName(): string {
    return $this->name;
  }

  public function setName(string $name): void {
    $this->name = $name;
  }

  public function getValue(): string {
    return $this->value;
  }

  public function setValue(string $value): void {
    $this->value = $value;
  }

}
