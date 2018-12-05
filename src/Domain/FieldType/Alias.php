<?php

namespace LibKml\Domain\FieldType;

/**
 * Alias class.
 */
class Alias {

  private $targetHref;
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
