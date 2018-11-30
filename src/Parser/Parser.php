<?php

namespace LibKml\Parser;

use LibKml\KmlDocument;

interface Parser {
  /**
   * @param string $content
   * @return KmlDocument
   */
  public function parse(string $content);
}
