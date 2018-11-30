<?php

namespace LibKml\Domain\FieldType;

class Icon {

  private $href;

  public function getHref() {
    return $this->href;
  }

  public function setHref($href): void {
    $this->href = $href;
  }

}
