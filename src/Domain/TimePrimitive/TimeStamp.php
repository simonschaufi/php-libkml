<?php

namespace LibKML\Domain\TimePrimitive;

/**
 * TimeStamp class.
 */
class TimeStamp extends TimePrimitive {

  private $when;

  /**
   *
   */
  public function getWhen() {
    return $this->when;
  }

  /**
   *
   */
  public function setWhen($when) {
    $this->when = $when;
  }

}
