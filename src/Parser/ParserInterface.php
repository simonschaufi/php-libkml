<?php

namespace LibKml\Parser;

use LibKml\KmlDocument;

/**
 * Parses an geo info source and loads the content in a KmlDocument.
 */
interface ParserInterface {

  public function parse(string $content): KmlDocument;

}
