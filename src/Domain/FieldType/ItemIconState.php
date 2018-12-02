<?php

namespace LibKml\Domain\FieldType;

/**
 * Specifies the current state of the NetworkLink or Folder.
 */
class ItemIconState {

  const OPEN = 'open';
  const CLOSED = 'closed';
  const ERROR = 'error';
  const FETCHING0 = 'fetching0';
  const FETCHING1 = 'fetching1';
  const FETCHING2 = 'fetching2';

}
