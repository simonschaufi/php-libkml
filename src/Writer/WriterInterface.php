<?php

namespace LibKml\Writer;

use LibKml\KmlDocument;

/**
 * Interface FormatGenerator.
 */
interface WriterInterface {

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
