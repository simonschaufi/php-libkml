<?php

namespace LibKml\Domain;

/**
 * Scale class.
 */
class Scale {

  private $x;
  private $y;
  private $z;

  public function getX(): float {
    return $this->x;
  }

  public function setX(float $x) {
    $this->x = $x;
  }

  public function getY(): float {
    return $this->y;
  }

  public function setY(float $y) {
    $this->y = $y;
  }

  public function getZ(): float {
    return $this->z;
  }

  public function setZ(float $z) {
    $this->z = $z;
  }

}
