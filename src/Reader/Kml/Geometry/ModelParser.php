<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\Geometry\Model;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\FieldType\OrientationParser;
use LibKml\Reader\Kml\FieldType\ResourceMapParser;
use LibKml\Reader\Kml\KmlElementParserFactory;
use LibKml\Reader\Kml\KmlElementParserInterface;
use LibKml\Reader\Kml\KmlObjectParser;

class ModelParser extends KmlObjectParser
{
    private KmlElementParserInterface $linkParser;

    public function __construct()
    {
        $this->linkParser = KmlElementParserFactory::getInstance()->getParserByElementName(KmlElementParserFactory::LINK);
    }

    protected function buildKmlObject(): KmlObject
    {
        return new Model();
    }

    /**
     * @param KmlObject|Model $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->altitudeMode)) {
            $kmlObject->setAltitudeMode((string)$element->altitudeMode);
        }

        if (isset($element->Location)) {
            $kmlObject->setLocation($this->parseLocation($element->Location));
        }

        if (isset($element->Orientation)) {
            $orientation = OrientationParser::parse($element->Orientation);
            $kmlObject->setOrientation($orientation);
        }

        if (isset($element->ResourceMap)) {
            $resourceMap = ResourceMapParser::parse($element->ResourceMap);
            $kmlObject->setResourceMap($resourceMap);
        }

        if (isset($element->Link)) {
            $link = $this->linkParser->parse($element->Link);
            $kmlObject->setLink($link);
        }
    }

    private function parseLocation(\SimpleXMLElement $element): Coordinates
    {
        $coordinates = new Coordinates();

        if (isset($element->longitude)) {
            $coordinates->setLongitude((float)$element->longitude);
        }

        if (isset($element->latitude)) {
            $coordinates->setLatitude((float)$element->latitude);
        }

        if (isset($element->altitude)) {
            $coordinates->setAltitude((float)$element->altitude);
        }

        return $coordinates;
    }
}
