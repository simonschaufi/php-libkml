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

  public function getMinLodPixels(): int {
    return $this->minLodPixels;
  }

  public function setMinLodPixels($minLodPixels): void {
    $this->minLodPixels = $minLodPixels;
  }

  public function getMaxLodPixels(): int {
    return $this->maxLodPixels;
  }

  public function setMaxLodPixels($maxLodPixels): void {
    $this->maxLodPixels = $maxLodPixels;
  }

  public function getMinFadeExtent(): int {
    return $this->minFadeExtent;
  }

  public function setMinFadeExtent($minFadeExtent): void {
    $this->minFadeExtent = $minFadeExtent;
  }

  public function getMaxFadeExtent(): int {
    return $this->maxFadeExtent;
  }

  public function setMaxFadeExtent($maxFadeExtent): void {
    $this->maxFadeExtent = $maxFadeExtent;
  }

}
