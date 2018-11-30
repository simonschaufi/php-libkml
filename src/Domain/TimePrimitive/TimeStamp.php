<?php

namespace LibKml\Domain\TimePrimitive;

use LibKml\Domain\KmlObjectVisitor;

/**
 * TimeStamp class.
 */
class TimeStamp extends TimePrimitive {

  private $when;

  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitTimeStamp($this);
  }

  public function getWhen() {
    return $this->when;
  }

  public function setWhen($when) {
    $this->when = $when;
  }

}
