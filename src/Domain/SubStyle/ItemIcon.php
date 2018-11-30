<?php

namespace LibKml\Domain\SubStyle;

class ItemIcon {

  private $href;
  private $state;

  public function getHref() {
    return $this->href;
  }

  public function setHref($href) {
    $this->href = $href;
  }

  public function getState() {
    return $this->state;
  }

  public function setState($state) {
    $this->state = $state;
  }

}
