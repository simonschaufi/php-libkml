<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml\Feature;

use LibKml\Domain\Feature\Placemark;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\Exception\UnsupportedTagException;
use LibKml\Reader\Kml\KmlElementParserFactory;

class PlacemarkParser extends FeatureParser
{
    private KmlElementParserFactory $kmlElementParserFactory;

    public function __construct()
    {
        $this->kmlElementParserFactory = KmlElementParserFactory::getInstance();
    }

    protected function buildKmlObject(): KmlObject
    {
        return new Placemark();
    }

    /**
     * @param KmlObject|Placemark $kmlObject
     * @throws UnsupportedTagException
     */
    protected function loadValues(KmlObject $kmlObject, \SimpleXMLElement $element): void
    {
        parent::loadValues($kmlObject, $element);

        if (isset($element->Point)) {
            $pointParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::POINT);
            $kmlObject->setGeometry($pointParser->parse($element->Point));
        }

        if (isset($element->TimeStamp)) {
            $timeStampParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::TIME_STAMP);
            $kmlObject->setTimePrimitive($timeStampParser->parse($element->TimeStamp));
        }

        if (isset($element->TimeSpan)) {
            $timeSpanParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::TIME_SPAN);
            $kmlObject->setTimePrimitive($timeSpanParser->parse($element->TimeSpan));
        }
    }
}
