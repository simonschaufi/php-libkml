<?php

namespace LibKML\Domain\FieldType;

/**
 * Coordinates class type.
 */
class DateTime {
  private $timestamp;

  /**
   *
   */
  public function getTimestamp() {
    return $this->timestamp;
  }

  /**
   *
   */
  public function setTimestamp($timestamp) {
    $this->timestamp = $timestamp;
  }

}
