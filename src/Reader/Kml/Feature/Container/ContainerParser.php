<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\Feature\Container;

use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\Feature\FeatureExtractor;
use LibKml\Reader\Kml\Feature\FeatureParser;

abstract class ContainerParser extends FeatureParser
{
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        $features = FeatureExtractor::extractFeatures($element);

        $kmlObject->setFeatures($features);
    }
}
