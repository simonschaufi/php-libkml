<?php

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\SubStyle\SubStyle;

/**
 * ColorStyle abstract class.
 */
abstract class ColorStyle extends SubStyle {

  protected $color;
  protected $colorMode = "normal";

  public function __construct() {
    $this->color = Color::fromWhite();
  }

  public function getColor(): Color {
    return $this->color;
  }

  public function setColor(Color $color): void {
    $this->color = $color;
  }

  public function getColorMode(): string {
    return $this->colorMode;
  }

  public function setColorMode(string $colorMode): void {
    $this->colorMode = $colorMode;
  }

}
