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

  public function getBegin(): int {
    return $this->begin;
  }

  public function setBegin(int $begin): void {
    $this->begin = $begin;
  }

  public function getEnd(): int {
    return $this->end;
  }

  public function setEnd(int $end): void {
    $this->end = $end;
  }

}
