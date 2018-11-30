<?php

namespace LibKml\Domain\Feature\Container;

class SimpleField {

  private $type;
  private $name;
  private $displayName;

  public function getType(): string {
    return $this->type;
  }

  public function setType(string $type): void {
    $this->type = $type;
  }

  public function getName(): string {
    return $this->name;
  }

  public function setName(string $name): void {
    $this->name = $name;
  }

  public function getDisplayName(): string {
    return $this->displayName;
  }

  public function setDisplayName(string $displayName): void {
    $this->displayName = $displayName;
  }

}
