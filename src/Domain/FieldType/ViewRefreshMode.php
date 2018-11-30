<?php

namespace LibKml\Domain\FieldType;

/**
 * Specifies how the link is refreshed when the "camera" changes.
 *
 * @package LibKML\Domain\FieldType
 */
class ViewRefreshMode {
  const NEVER = 0;
  const ON_STOP = 1;
  const ON_REQUEST = 2;
  const ON_REGION = 3;

}
