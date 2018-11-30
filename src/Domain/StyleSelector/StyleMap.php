<?php

namespace LibKML\Domain\StyleSelector;

/**
 * StyleMap class.
 */
class StyleMap extends StyleSelector {

  private $pairs = array();

  /**
   *
   */
  public function addPair(Pair $pair) {
    $this->pairs[] = $pair;
  }

  /**
   *
   */
  public function clearPairs() {
    $this->pairs = array();
  }

  /**
   *
   */
  public function getPairs() {
    return $this->pairs;
  }

  /**
   *
   */
  public function setPairs(array $pairs) {
    $this->pairs = $pairs;
  }

}
