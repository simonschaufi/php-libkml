<?php

namespace LibKml\Domain\FieldType;

/**
 * Class Vec2.
 */
class Vec2 {

  private $x;
  private $y;
  private $xUnits;
  private $yUnits;

  public function getX(): float {
    return $this->x;
  }

  public function setX(float $x): void {
    $this->x = $x;
  }

  public function getY(): float {
    return $this->y;
  }

  public function setY(float $y): void {
    $this->y = $y;
  }

  public function getXUnits(): string {
    return $this->xUnits;
  }

  public function setXUnits(string $xUnits): void {
    $this->xUnits = $xUnits;
  }

  public function getYUnits(): string {
    return $this->yUnits;
  }

  public function setYUnits(string $yUnits): void {
    $this->yUnits = $yUnits;
  }

}
