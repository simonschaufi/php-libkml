<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml;

use LibKml\Domain\Icon;
use LibKml\Domain\KmlObject;

class IconParser extends KmlObjectParser
{
    protected function buildKmlObject(): KmlObject
    {
        return new Icon();
    }

    /**
     * @param KmlObject|Icon $kmlObject
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

        if (isset($element->viewBoundScale)) {
            $kmlObject->setViewBoundScale((float)$element->viewBoundScale);
        }

        if (isset($element->viewFormat)) {
            $kmlObject->setViewFormat((string)$element->viewFormat);
        }

        if (isset($element->httpQuery)) {
            $kmlObject->setHttpQuery((string)$element->httpQuery);
        }
    }
}
