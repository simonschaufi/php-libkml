<?php

namespace LibKml\Domain\Feature;

/**
 * Specifies how the altitude value is interpreted.
 */
class AltitudeMode {

  const CLAMP_TO_GROUND = 'clampToGround';
  const RELATIVE_TO_GROUND = 'relativeToGround';
  const ABSOLUTE = 'absolute';

}
