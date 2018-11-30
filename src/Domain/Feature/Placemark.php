<?php

namespace LibKML\Domain\Feature;

/**
 * Placemark abstract class.
 */
class Placemark extends Feature {

  private $geometry;

  /**
   *
   */
  public function getAllFeatures() {
    return array($this->geometry);
  }

  /**
   *
   */
  public function getGeometry() {
    return $this->geometry;
  }

  /**
   *
   */
  public function setGeometry($geometry) {
    $this->geometry = $geometry;
  }

}
