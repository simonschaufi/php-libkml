<?php

namespace LibKml\Domain\FieldType;

class Color {

  private $red = 0;
  private $green = 0;
  private $blue = 0;
  private $alpha = 0;

  public function getRed(): int {
    return $this->red;
  }

  public function setRed(int $red): void {
    $this->red = $red;
  }

  public function getGreen(): int {
    return $this->green;
  }

  public function setGreen(int $green): void {
    $this->green = $green;
  }

  public function getBlue(): int {
    return $this->blue;
  }

  public function setBlue(int $blue): void {
    $this->blue = $blue;
  }

  public function getAlpha(): int {
    return $this->alpha;
  }

  public function setAlpha(int $alpha): void {
    $this->alpha = $alpha;
  }

}
