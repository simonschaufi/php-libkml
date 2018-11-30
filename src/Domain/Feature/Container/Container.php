<?php

namespace LibKml\Domain\Feature\Container;

use LibKml\Domain\Feature\Feature;

/**
 * Container abstract class.
 */
abstract class Container extends Feature {

  protected $features = array();

  /**
   *
   */
  public function getAllFeatures() {
    $allFeatures = array();

    foreach ($this->features as $feature) {
      $allFeatures = array_merge($allFeatures, $feature->getAllFeatures());
    }

    return $allFeatures;
  }

  /**
   *
   */
  public function addFeature($feature) {
    $this->features[] = $feature;
  }

  /**
   *
   */
  public function clearFeatures() {
    $this->features = array();
  }

  /**
   *
   */
  public function getFeatures() {
    return $this->features;
  }

  /**
   *
   */
  public function setFeatures($features) {
    $this->features = $features;
  }

}
