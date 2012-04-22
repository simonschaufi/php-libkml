<?php
namespace libKML;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemIconState
 *
 * @author xavier
 */
class ItemIconState {
  
  public static $ITEM_ICON_STATE_OPEN = 0;
  public static $ITEM_ICON_STATE_CLOSED = 1;
  public static $ITEM_ICON_STATE_ERROR = 2;
  public static $ITEM_ICON_STATE_FETCHING0 = 3;
  public static $ITEM_ICON_STATE_FETCHING1 = 4;
  public static $ITEM_ICON_STATE_FETCHING2 = 5;
  
  public static $ITEM_ICON_STATE = array('open','closed','error','fetching0','fetching1','fetching2');
  
  private $state = 0;
  
  public function __construct($state) {
    $this->setStateFromString($state);
  }
  
  public function setState($state) {
    $this->state = $state;
  }
  
  public function getState() {
    return $this->state;
  }
  
  public function setStateFromString($string) {
    $this->state = array_search($string, ItemIconState::$ITEM_ICON_STATE);
  }
  
  public function __toString() {
    return (string) ItemIconState::$ITEM_ICON_STATE[$this->state];
  }
}

?>
