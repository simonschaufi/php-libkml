<?php

namespace LibKml\Domain\FieldType;

/**
 * Specifies how the link is refreshed when the "camera" changes.
 *
 * @package LibKML\Domain\FieldType
 */
class ViewRefreshMode {
  public static $NEVER = 0;
  public static $ON_STOP = 1;
  public static $ON_REQUEST = 2;
  public static $ON_REGION = 3;

}
