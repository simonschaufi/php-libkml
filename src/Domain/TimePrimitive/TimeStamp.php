<?php

namespace LibKml\Domain\TimePrimitive;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * TimeStamp class.
 */
class TimeStamp extends TimePrimitive {

  private $when;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitTimeStamp($this);
  }

  public function getWhen(): int {
    return $this->when;
  }

  public function setWhen(int $when): void {
    $this->when = $when;
  }

}
