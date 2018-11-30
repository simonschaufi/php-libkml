<?php

namespace LibKml\Domain\Feature;

/**
 * Altitude modes.
 */
class AltitudeMode {

  const ALTITUDE_MODE_CLAMP_TO_GROUND = 0;
  const ALTITUDE_MODE_RELATIVE_TO_GROUND = 1;
  const ALTITUDE_MODE_ABSOLUTE = 2;

  const ALTITUDE_MODE = array('clampToGround', 'relativeToGround', 'absolute');

  private $mode = 0;

  public function setMode($mode) {
    $this->mode = $mode;
  }

  public function getMode() {
    return $this->mode;
  }

  public function setModeFromString($string) {
    $this->mode = array_search($string, AltitudeMode::ALTITUDE_MODE);
  }

}
