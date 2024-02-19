<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\AbstractView;

use LibKml\Domain\AbstractView\Camera;
use LibKml\Domain\KmlObject;

class CameraParser extends AbstractViewParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new Camera();
    }

    /**
     * @param KmlObject|Camera $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->roll)) {
            $kmlObject->setRoll((float)$element->roll);
        }
    }
}
