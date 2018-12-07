<?php

namespace LibKml\Tests\Bdd\Read\Kml;

use Behat\Behat\Context\Context;
use LibKml\Reader\LibKmlReader;

/**
 * Defines application features from the specific context.
 */
class ParserKmlContext implements Context {

  private $kmlText;
  private $kmlReader;
  private $kmlDocument;

  public function __construct() {
    $this->kmlReader = new LibKmlReader();
  }

  /**
   * @Given a KML document with a :objectType in :arg1
   * @Given a KML document in :arg1
   */
  public function aKmlDocument($arg1) {
    $this->kmlText = file_get_contents($arg1);
  }

  /**
   * @When I parse the KML document
   */
//  public function iParseTheKmlDocument() {
//    $this->kmlDocument = $this->kmlReader->fromKml($this->kmlText);
//  }

}
