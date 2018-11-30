<?php

namespace LibKML\Domain;

/**
 * Region class.
 */
class Region extends KMLObject {

  private $latLonAltBox;
  private $lod;

  /**
   *
   */
  public function getLatLonAltBox() {
    return $this->latLonAltBox;
  }

  /**
   *
   */
  public function setLatLonAltBox($latLonAltBox) {
    $this->latLonAltBox = $latLonAltBox;
  }

  /**
   *
   */
  public function getLod() {
    return $this->lod;
  }

  /**
   *
   */
  public function setLod($lod) {
    $this->lod = $lod;
  }

}
