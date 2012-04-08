<?php
namespace libKML;

/**
 *  Coordinates class type
 */

class DateTime {
  public $timestamp;
  
  public function __toString() {
    return implode(date("Y-m-d\Th:m:sz"), $this->timestamp);
  }
}