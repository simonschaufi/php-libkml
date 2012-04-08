<?php

namespace libKML;

/**
 *  Altitude modes
 */
class ColorMode {
  
  public static $COLOR_MODE_NORMAL = 0;
  public static $COLOR_MODE_RANDOM = 1;
  
  public static $COLOR_MODE = array('normal', 'random');
  
  private $mode = 0;
  
  public function setMode($mode) {
    $this->mode = $mode;
  }
  
  public function getMode() {
    return $this->mode;
  }
  
  public function setModeFromString($string) {
    $this->mode = array_search($string, ColorMode::$COLOR_MODE);
  }
  
  public function __toString() {
    return (string)ColorMode::$COLOR_MODE[$this->mode];
  }
  
}