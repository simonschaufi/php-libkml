<?php

namespace LibKml\Domain\Geometry;

/**
 * Alias class.
 */
class Alias {

  /**
   * @var string
   */
  private $targetHref;

  /**
   * @var string
   */
  private $sourceHref;

  public function getTargetHref() {
    return $this->targetHref;
  }

  public function setTargetHref(string $targetHref) {
    $this->targetHref = $targetHref;
  }

  public function getSourceHref() {
    return $this->sourceHref;
  }

  public function setSourceHref(string $sourceHref) {
    $this->sourceHref = $sourceHref;
  }

}
