<?php

namespace LibKml\Domain\StyleSelector;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * StyleMap class.
 */
class StyleMap extends StyleSelector {

  private $pairs = array();

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitStyleMap($this);
  }

  public function addPair(Pair $pair) {
    $this->pairs[] = $pair;
  }

  public function clearPairs() {
    $this->pairs = array();
  }

  public function getPairs() {
    return $this->pairs;
  }

  public function setPairs(array $pairs) {
    $this->pairs = $pairs;
  }

}
