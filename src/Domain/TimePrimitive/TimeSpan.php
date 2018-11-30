<?php

namespace LibKML\Domain\TimePrimitive;

/**
 * TimeSpan class.
 */
class TimeSpan extends TimePrimitive {

  private $begin;
  private $end;

  /**
   *
   */
  public function getBegin() {
    return $this->begin;
  }

  /**
   *
   */
  public function setBegin($begin) {
    $this->begin = $begin;
  }

  /**
   *
   */
  public function getEnd() {
    return $this->end;
  }

  /**
   *
   */
  public function setEnd($end) {
    $this->end = $end;
  }

}
