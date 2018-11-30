<?php

namespace LibKml\Domain\FieldType;

/**
 * Altitude modes.
 */
class ColorMode {

  const COLOR_MODE_NORMAL = 0;
  const COLOR_MODE_RANDOM = 1;

  const COLOR_MODE = ['normal', 'random'];

  private $mode = 0;

  public function getMode() {
    return $this->mode;
  }

  public function setMode($mode) {
    $this->mode = $mode;
  }

  public function setModeFromString($string) {
    $this->mode = array_search($string, ColorMode::COLOR_MODE);
  }

}
