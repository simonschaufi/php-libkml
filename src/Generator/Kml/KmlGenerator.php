<?php
/**
 * Created by PhpStorm.
 * User: xavier
 * Date: 30/11/18
 * Time: 10:17
 */

namespace LibKml\Generator\Kml;


use LibKml\Generator\FormatGenerator;
use LibKml\KmlDocument;

class KmlGenerator implements FormatGenerator {

  /**
   * Generates the KmlDocument in KML format schema version 2.2
   *
   * @param KmlDocument $kmlDocument The KmlDocument to generate from
   * @return string Generated KML code
   */
  public function generate(KmlDocument $kmlDocument) {
    // TODO: Implement generate() method.
  }
}
