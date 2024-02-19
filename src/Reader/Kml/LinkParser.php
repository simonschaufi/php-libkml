<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml;

use LibKml\Domain\KmlObject;
use LibKml\Domain\Link;

class LinkParser extends KmlObjectParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new Link();
    }

    /**
     * @param KmlObject|Link $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->href)) {
            $kmlObject->setHref((string)$element->href);
        }

        if (isset($element->refreshMode)) {
            $kmlObject->setRefreshMode((string)$element->refreshMode);
        }

        if (isset($element->refreshInterval)) {
            $kmlObject->setRefreshInterval((float)$element->refreshInterval);
        }

        if (isset($element->viewRefreshMode)) {
            $kmlObject->setViewRefreshMode((string)$element->viewRefreshMode);
        }

        if (isset($element->viewRefreshTime)) {
            $kmlObject->setViewRefreshTime((float)$element->viewRefreshTime);
        }

        if (isset($element->viewFormat)) {
            $kmlObject->setViewFormat((string)$element->viewFormat);
        }
    }
}
