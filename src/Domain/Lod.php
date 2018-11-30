<?php

namespace LibKml\Domain;

/**
 * Lod class.
 */
class Lod {

  private $minLodPixels;
  private $maxLodPixels;
  private $minFadeExtent;
  private $maxFadeExtent;

  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitLod($this);
  }

  public function getMinLodPixels() {
    return $this->minLodPixels;
  }

  public function setMinLodPixels($minLodPixels) {
    $this->minLodPixels = $minLodPixels;
  }

  public function getMaxLodPixels() {
    return $this->maxLodPixels;
  }

  public function setMaxLodPixels($maxLodPixels) {
    $this->maxLodPixels = $maxLodPixels;
  }

  public function getMinFadeExtent() {
    return $this->minFadeExtent;
  }

  public function setMinFadeExtent($minFadeExtent) {
    $this->minFadeExtent = $minFadeExtent;
  }

  public function getMaxFadeExtent() {
    return $this->maxFadeExtent;
  }

  public function setMaxFadeExtent($maxFadeExtent) {
    $this->maxFadeExtent = $maxFadeExtent;
  }

}
