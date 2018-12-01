<?php

namespace LibKml\Domain\SubStyle;

class ItemIcon {

  private $href;
  private $state;

  public function getHref(): string {
    return $this->href;
  }

  public function setHref(string $href): void {
    $this->href = $href;
  }

  public function getState(): string {
    return $this->state;
  }

  public function setState(string $state): void {
    $this->state = $state;
  }

}
