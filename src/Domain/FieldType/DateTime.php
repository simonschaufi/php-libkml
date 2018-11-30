<?php

namespace LibKml\Domain\FieldType;

/**
 * Coordinates class type.
 */
class DateTime {

  /**
   * @var int
   */
  private $timestamp;

  public function getTimestamp() {
    return $this->timestamp;
  }

  public function setTimestamp(int $timestamp) {
    $this->timestamp = $timestamp;
  }

}
