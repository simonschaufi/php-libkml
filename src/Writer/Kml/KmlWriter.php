<?php

namespace LibKml\Writer\Kml;

use LibKml\Writer\WriterInterface;
use LibKml\KmlDocument;

/**
 *
 */
class KmlWriter implements WriterInterface {

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
