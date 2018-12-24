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

  public function getWhen(): ?string {
    return $this->when;
  }

  public function setWhen(?string $when): void {
    $this->when = $when;
  }

}
