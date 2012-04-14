<?php
namespace libKML;

/**
 *  Coordinates class type
 */

class DateTime {
  private $timestamp;
  
  public function __toString() {
    return implode(date("Y-m-d\Th:m:sz"), $this->timestamp);
  }
  
  public function getTimestamp() {
    return $this->timestamp;
  }
  
  public function setTimestamp($timestamp) {
    $this->timestamp = $timestamp;
  }
  
}