<?php

namespace LibKml\Domain\ExtendedData;

class Data {

  private $name;
  private $value;
  private $displayName;

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

  public function getDisplayName(): string {
    return $this->displayName;
  }

  public function setDisplayName(string $displayName): void {
    $this->displayName = $displayName;
  }

}
