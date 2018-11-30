<?php

namespace LibKml\Domain\Feature\Container;

use LibKml\Domain\Feature\Feature;

/**
 * Container abstract class.
 */
abstract class Container extends Feature {

  protected $features = [];

  public function addFeature(Feature $feature) {
    $this->features[] = $feature;
  }

  public function clearFeatures() {
    $this->features = [];
  }

  public function getFeatures(): array {
    return $this->features;
  }

  public function setFeatures(array $features) {
    $this->features = $features;
  }

}
