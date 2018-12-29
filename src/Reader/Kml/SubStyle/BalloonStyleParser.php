<?php

namespace LibKml\Reader\Kml\SubStyle;

use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\BalloonStyle;
use LibKml\Reader\Kml\KmlObjectParser;

class BalloonStyleParser extends KmlObjectParser {

  protected function buildKmlObject(): KmlObject {
    return new BalloonStyle();
  }
}
