<?php

namespace libKML;

/**
 *   Refresh modes onChange, onInterval, or onExpire
 */
class RefreshMode {
  
  public static $REFRESH_MODE_ON_CHANGE = 0;
  public static $REFRESH_MODE_ON_INTERVAL = 1;
  public static $REFRESH_MODE_ON_EXPIRE = 2;
  
  public static $REFRESH_MODE = array('onChange', 'onInterval', 'onExpire');
  
  private $mode = 0;
  
  public function setMode($mode) {
    $this->mode = $mode;
  }
  
  public function getMode() {
    return $this->mode;
  }
  
  public function setModeFromString($string) {
    $this->mode = array_search($string, RefreshMode::$REFRESH_MODE);
  }
  
  public function __toString() {
    return (string)RefreshMode::$REFRESH_MODE[$this->mode];
  }
  
}