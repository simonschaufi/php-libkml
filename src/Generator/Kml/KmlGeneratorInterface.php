<?php

namespace LibKml\Generator\Kml;

use LibKml\Generator\FormatGeneratorInterface;
use LibKml\KmlDocument;

/**
 *
 */
class KmlGeneratorInterface implements FormatGeneratorInterface {

  /**
   * Generates the KmlDocument in KML format schema version 2.2.
   *
   * @param \LibKml\KmlDocument $kmlDocument
   *   The KmlDocument to generate from.
   *
   * @return string Generated KML code
   */
  public function generate(KmlDocument $kmlDocument) {
    // TODO: Implement generate() method.
  }

}
