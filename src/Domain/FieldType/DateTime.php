<?php

namespace LibKml\Domain\FieldType;

/**
 * Coordinates class type.
 */
class DateTime {

  private $timestamp;

  public function getTimestamp(): int {
    return $this->timestamp;
  }

  public function setTimestamp(int $timestamp) {
    $this->timestamp = $timestamp;
  }

}
