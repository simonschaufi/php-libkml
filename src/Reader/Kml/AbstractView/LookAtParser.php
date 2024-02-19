<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\AbstractView;

use LibKml\Domain\AbstractView\LookAt;
use LibKml\Domain\KmlObject;

class LookAtParser extends AbstractViewParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new LookAt();
    }

    /**
     * @param KmlObject|LookAt $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->range)) {
            $kmlObject->setRange((float)$element->range);
        }
    }
}
