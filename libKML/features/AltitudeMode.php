<?php

namespace libKML;

/**
 *  Altitude modes
 */
class AltitudeMode {
  
  public static $ALTITUDE_MODE_CLAMP_TO_GROUND = 0;
  public static $ALTITUDE_MODE_RELATIVE_TO_GROUND = 1;
  public static $ALTITUDE_MODE_ABSOLUTE = 2;
  
  public static $ALTITUDE_MODE = array('clampToGround', 'relativeToGround', 'absolute');
  
  private $mode = 0;
  
  public function setMode($mode) {
    $this->mode = $mode;
  }
  
  public function getMode() {
    return $this->mode;
  }
  
  public function setModeFromString($string) {
    $this->mode = array_search($string, AltitudeMode::$ALTITUDE_MODE);
  }
  
  public function __toString() {
    return (string)AltitudeMode::$ALTITUDE_MODE[$this->mode];
  }
  
}