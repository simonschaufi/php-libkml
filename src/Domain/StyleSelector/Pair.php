<?php

namespace LibKML\Domain\StyleSelector;

use LibKML\Domain\KMLObject;

/**
 * Pair class.
 */
class Pair extends KMLObject {

  private $key;
  private $styleUrl;

  /**
   *
   */
  public function getKey() {
    return $this->key;
  }

  /**
   *
   */
  public function setKey($key) {
    $this->key = $key;
  }

  /**
   *
   */
  public function getStyleUrl() {
    return $this->styleUrl;
  }

  /**
   *
   */
  public function setStyleUrl($styleUrl) {
    $this->styleUrl = $styleUrl;
  }

}
