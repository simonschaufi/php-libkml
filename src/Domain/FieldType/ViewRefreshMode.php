<?php

namespace LibKml\Domain\FieldType;

/**
 * Specifies how the link is refreshed when the "camera" changes.
 */
class ViewRefreshMode {

  const NEVER = "never";
  const ON_STOP = "onStop";
  const ON_REQUEST = "onRequest";
  const ON_REGION = "onRegion";

}
