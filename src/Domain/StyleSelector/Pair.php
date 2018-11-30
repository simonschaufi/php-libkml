<?php

namespace LibKml\Domain\StyleSelector;

/**
 * Pair class.
 */
class Pair {

  private $key;
  private $styleUrl;

  public function getKey() {
    return $this->key;
  }

  public function setKey($key) {
    $this->key = $key;
  }

  public function getStyleUrl() {
    return $this->styleUrl;
  }

  public function setStyleUrl($styleUrl) {
    $this->styleUrl = $styleUrl;
  }

}
