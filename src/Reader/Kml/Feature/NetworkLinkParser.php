<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\Feature;

use LibKml\Domain\Feature\NetworkLink;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\KmlElementParserFactory;
use LibKml\Reader\Kml\KmlElementParserInterface;

class NetworkLinkParser extends FeatureParser
{
    private KmlElementParserInterface $linkParser;

    public function __construct()
    {
        $this->linkParser = KmlElementParserFactory::getInstance()->getParserByElementName(KmlElementParserFactory::LINK);
    }

    protected function buildKmlObject(): KmlObject
    {
        return new NetworkLink();
    }

    /**
     * @param KmlObject|NetworkLink $kmlObject
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->Link)) {
            $kmlObject->setLink($this->linkParser->parse($element->Link));
        }
    }
}
