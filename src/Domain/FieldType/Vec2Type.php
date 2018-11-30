<?php

namespace LibKml\Domain\FieldType;

/**
 * Class Vec2Type.
 *
 * @package LibKML\Domain\FieldType
 */
class Vec2Type {

  private $x;
  private $y;
  private $xUnits;
  private $yUnits;

  public function getX() {
    return $this->x;
  }

  public function setX($x) {
    $this->x = $x;
  }

  public function getY() {
    return $this->y;
  }

  public function setY($y) {
    $this->y = $y;
  }

  public function getXUnits() {
    return $this->xUnits;
  }

  public function setXUnits($xUnits) {
    $this->xUnits = $xUnits;
  }

  public function getYUnits() {
    return $this->yUnits;
  }

  public function setYUnits($yUnits) {
    $this->yUnits = $yUnits;
  }

}
