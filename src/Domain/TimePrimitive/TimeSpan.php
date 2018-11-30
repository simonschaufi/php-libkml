<?php

namespace LibKml\Domain\TimePrimitive;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * TimeSpan class.
 */
class TimeSpan extends TimePrimitive {

  private $begin;
  private $end;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitTimeSpan($this);
  }

  public function getBegin() {
    return $this->begin;
  }

  public function setBegin($begin) {
    $this->begin = $begin;
  }

  public function getEnd() {
    return $this->end;
  }

  public function setEnd($end) {
    $this->end = $end;
  }

}
