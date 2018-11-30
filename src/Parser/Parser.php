<?php

namespace LibKml\Parser;

interface Parser {

  /**
   * @param string $content
   * @return \LibKml\KmlDocument
   */
  public function parse(string $content);

}
