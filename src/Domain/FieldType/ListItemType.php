<?php

namespace LibKml\Domain\FieldType;

/**
 * Altitude modes.
 */
class ListItemType {

  public static $LIST_ITEM_TYPE_CHECK = 0;
  public static $LIST_ITEM_TYPE_RADIO_FOLDER = 1;
  public static $LIST_ITEM_TYPE_CHECK_OFF_ONLY = 2;
  public static $LIST_ITEM_TYPE_CHECK_HIDE_CHILDREN = 3;

  public static $LIST_ITEM_TYPE = array('check', 'checkOffOnly', 'checkHideChildren', 'radioFolder');

  private $mode = 0;

  /**
   *
   */
  public function getMode() {
    return $this->mode;
  }

  /**
   *
   */
  public function setMode($mode) {
    $this->mode = $mode;
  }

  /**
   *
   */
  public function setModeFromString($string) {
    $this->mode = array_search($string, ListItemType::$LIST_ITEM_TYPE);
  }

}
