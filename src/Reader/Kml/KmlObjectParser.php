<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml;

use LibKml\Domain\KmlObject;

abstract class KmlObjectParser implements KmlElementParserInterface
{
    /**
     * Parses an XML node and returns a KmlObject.
     */
    public function parse(\SimpleXMLElement $xmlNode): KmlObject
    {
        $kmlObject = $this->buildKmlObject();
        $this->loadValues($kmlObject, $xmlNode);
        return $kmlObject;
    }

    abstract protected function buildKmlObject(): KmlObject;

    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        if (isset($element['id'])) {
            $kmlObject->setId((string)$element['id']);
        }
        if (isset($element['targetId'])) {
            $kmlObject->setTargetId((string)$element['targetId']);
        }
    }
}
