<?php

namespace LibKml\Generator;

use LibKml\KmlDocument;

/**
 * Interface FormatGenerator.
 *
 * @package LibKml\Converter
 */
interface FormatGenerator {

  /**
   * Generates a string with the formatted content of the KmlDocument.
   *
   * @param \LibKml\KmlDocument $kmlDocument
   *   The KmlDocument to generate from.
   *
   * @return string Generated code
   */
  public function generate(KmlDocument $kmlDocument);

}
