<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\ScreenOverlay;
use LibKml\Domain\KmlObject;

class ScreenOverlayParser extends OverlayParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new ScreenOverlay();
    }
}
