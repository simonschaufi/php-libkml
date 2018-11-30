<?php

namespace LibKml\Domain\Geometry;

use LibKml\Domain\KmlObject;
use LibKml\Domain\KmlObjectVisitor;

/**
 * Alias class.
 */
class Alias extends KmlObject {

  private $targetHref;
  private $sourceHref;

  /**
   * @param \LibKml\Domain\KmlObjectVisitor $visitor
   */
  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitAlias($this);
  }

  /**
   *
   */
  public function getTargetHref() {
    return $this->targetHref;
  }

  /**
   *
   */
  public function setTargetHref($targetHref) {
    $this->targetHref = $targetHref;
  }

  /**
   *
   */
  public function getSourceHref() {
    return $this->sourceHref;
  }

  /**
   *
   */
  public function setSourceHref($sourceHref) {
    $this->sourceHref = $sourceHref;
  }

}
