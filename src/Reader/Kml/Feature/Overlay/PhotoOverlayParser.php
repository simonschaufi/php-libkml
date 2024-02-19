<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\PhotoOverlay;
use LibKml\Domain\KmlObject;

class PhotoOverlayParser extends OverlayParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new PhotoOverlay();
    }
}
