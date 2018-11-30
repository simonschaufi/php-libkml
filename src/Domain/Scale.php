<?php

namespace LibKml\Domain;

/**
 * Scale class.
 */
class Scale {

  private $x;
  private $y;
  private $z;

  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitScale($this);
  }

  /**
   * @return float
   */
  public function getX() {
    return $this->x;
  }

  public function setX(float $x) {
    $this->x = $x;
  }

  /**
   * @return float
   */
  public function getY() {
    return $this->y;
  }

  public function setY(float $y) {
    $this->y = $y;
  }

  /**
   * @return float
   */
  public function getZ() {
    return $this->z;
  }

  public function setZ(float $z) {
    $this->z = $z;
  }

}
