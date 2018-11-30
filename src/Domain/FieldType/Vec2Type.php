<?php

namespace LibKML\Domain\FieldType;

/**
 * Class Vec2Type.
 *
 * @package LibKML\Domain\FieldType
 */
class Vec2Type {
  private $x;
  private $y;
  private $xunits;
  private $yunits;

  /**
   *
   */
  public function getX() {
    return $this->x;
  }

  /**
   *
   */
  public function setX($x) {
    $this->x = $x;
  }

  /**
   *
   */
  public function getY() {
    return $this->y;
  }

  /**
   *
   */
  public function setY($y) {
    $this->y = $y;
  }

  /**
   *
   */
  public function getXUnits() {
    return $this->xunits;
  }

  /**
   *
   */
  public function setXUnits($xunits) {
    $this->xunits = $xunits;
  }

  /**
   *
   */
  public function getYUnits() {
    return $this->yunits;
  }

  /**
   *
   */
  public function setYUnits($yunits) {
    $this->yunits = $yunits;
  }

}
