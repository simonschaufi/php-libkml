<?php

namespace LibKml\Reader\Kml\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\GroundOverlay;
use LibKml\Domain\KmlObject;

class GroundOverlayParser extends OverlayParser {

  protected function buildKmlObject(): KmlObject {
    return new GroundOverlay();
  }

}
