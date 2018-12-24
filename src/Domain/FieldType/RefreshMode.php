<?php

namespace LibKml\Domain\FieldType;

/**
 * Specifies a time-based refresh mode.
 */
class RefreshMode {
  const ON_CHANGE = 'onChange';
  const ON_INTERVAL = 'onInterval';
  const ON_EXPIRE = 'onExpire';
}
