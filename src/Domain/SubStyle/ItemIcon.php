<?php

namespace LibKml\Domain\SubStyle;

use LibKml\Domain\FieldType\ItemIconState;

class ItemIcon {

  private $href;
  private $state = ItemIconState::OPEN;

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
