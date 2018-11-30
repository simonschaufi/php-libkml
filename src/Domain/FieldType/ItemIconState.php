<?php

namespace LibKml\Domain\FieldType;

/**
 * Description of ItemIconState.
 */
class ItemIconState {

  const ITEM_ICON_STATE_OPEN = 0;
  const ITEM_ICON_STATE_CLOSED = 1;
  const ITEM_ICON_STATE_ERROR = 2;
  const ITEM_ICON_STATE_FETCHING0 = 3;
  const ITEM_ICON_STATE_FETCHING1 = 4;
  const ITEM_ICON_STATE_FETCHING2 = 5;

  const ITEM_ICON_STATE = [
    'open',
    'closed',
    'error',
    'fetching0',
    'fetching1',
    'fetching2',
  ];

  private $state = 0;

  public function __construct($state) {
    $this->setStateFromString($state);
  }

  public function setStateFromString($string) {
    $this->state = array_search($string, ItemIconState::$ITEM_ICON_STATE);
  }

  public function getState() {
    return $this->state;
  }

  public function setState($state) {
    $this->state = $state;
  }

}
