<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml;

use LibKml\Domain\KmlObject;

interface KmlElementParserInterface
{
    public function parse(\SimpleXMLElement $xmlNode): KmlObject;
}
