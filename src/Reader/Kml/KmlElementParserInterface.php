<?php

namespace LibKml\Reader\Kml;

use LibKml\Domain\KmlObject;
use SimpleXMLElement;

interface KmlElementParserInterface {

  public function parse(SimpleXMLElement $xmlNode): KmlObject;

}
