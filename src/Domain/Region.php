<?php

namespace LibKml\Domain;

/**
 * Region class.
 */
class Region extends KmlObject {

  private $latLonAltBox;
  private $lod;

  /**
   * @param KmlObjectVisitor $visitor
   */
  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitRegion($this);
  }

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
