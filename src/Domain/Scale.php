<?php

namespace LibKml\Domain;

/**
 * Describe an scale of an element along the x, y, and z axes.
 */
class Scale {

  private $x = 0;
  private $y = 0;
  private $z = 0;

  public static function fromCoordinates($x, $y, $z): Scale {
    $scale = new Scale();
    $scale->x = $x;
    $scale->y = $y;
    $scale->z = $z;
    return $scale;
  }

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
