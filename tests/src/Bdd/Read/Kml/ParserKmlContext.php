<?php

namespace LibKml\Tests\Bdd\Read\Kml;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use LibKml\Domain\KmlDocument;
use LibKml\Reader\LibKmlReader;
use PHPUnit\Framework\TestCase;

/**
 * Defines application features from the specific context.
 */
class ParserKmlContext implements Context {

  private $kmlText;
  private $kmlReader;

  /**
   * @var KmlDocument
   */
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
  public function iParseTheKmlDocument() {
    $this->kmlDocument = $this->kmlReader->fromKml($this->kmlText);
  }

  /**
   * @Then I should get a KmlDocument object containing one :featureType
   */
  public function iShouldGetAKmldocumentObjectContainingOne($featureType) {
    TestCase::assertInstanceOf($featureType, $this->kmlDocument->getFeature());
  }

  /**
   * @Then the :element should contain the following properties:
   */
  public function theDocumentShouldContainTheFollowingProperties(TableNode $table) {
    $feature = $this->kmlDocument->getFeature();
    foreach ($table->getRows() as $i => $row) {
      if ($i > 0) {
        $value = $feature->{"get" . ucfirst($row[0])}();

        switch ($row[1]) {
          case 'true':
            TestCase::assertTrue($value);
            break;

          case 'false':
            TestCase::assertFalse($value);
            break;

          default:
            TestCase::assertEquals($row[1], $feature->{"get" . ucfirst($row[0])}());
        }
      }
    }
  }

}
