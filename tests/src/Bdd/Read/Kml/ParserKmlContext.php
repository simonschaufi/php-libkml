<?php

namespace LibKml\Tests\Bdd\Read\Kml;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use LibKml\Domain\KmlDocument;
use LibKml\Domain\StyleSelector\Style;
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

  protected $target;

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
   * @Then I should get a KmlDocument object containing one NetworkLinkControl
   */
  public function iShouldGetAKmlDocumentObjectContainingOneNetworkLinkControl() {
    TestCase::assertInstanceOf("LibKml\Domain\FieldType\NetworkLinkControl", $this->kmlDocument->getNetworkLinkControl());
  }

  /**
   * @Then I should get a KmlDocument object containing one feature :featureType
   */
  public function iShouldGetAKmlDocumentObjectContainingOneFeature($featureType) {
    TestCase::assertInstanceOf($featureType, $this->kmlDocument->getFeature());
  }

  /**
   * @Then the NetworkLinkControl should contain the following properties:
   */
  public function theNetworklinkcontrolShouldContainTheFollowingProperties(TableNode $table) {
    $networkLinkControl = $this->kmlDocument->getNetworkLinkControl();
    $this->containsProperties($networkLinkControl, $table);
  }

  /**
   * @Then the NetworkLinkControl should contain a Camera with a :timePrimitiveType TimePrimitive property
   */
  public function theNetworklinkcontrolShouldContainACameraWithATimeprimitiveProperty($timePrimitiveType) {
    $networkLinkControl = $this->kmlDocument->getNetworkLinkControl();
    TestCase::assertNotNull($networkLinkControl->getAbstractView());

    $abstractView = $networkLinkControl->getAbstractView();
    TestCase::assertNotNull($abstractView->getTimePrimitive());

    $this->target = $abstractView->getTimePrimitive();
  }

  /**
   * @Then the TimeSpan/TimeStamp object should contain the following properties:
   */
  public function theTimespanTimeStampObjectShouldContainTheFollowingProperties(TableNode $table) {

  }

  /**
   * @Then the feature should contain a LookAt object with the the following properties:
   */
  public function theFeatureShouldContainALookatObjectWithTheTheFollowingProperties(TableNode $table) {
    $feature = $this->kmlDocument->getFeature();
    $this->containsProperties($feature->getAbstractView(), $table);
  }

  /**
   * @Then the feature should contain a Style object with the following properties:
   */
  public function theFeatureShouldContainAStyleObjectWithTheFollowingProperties(TableNode $table) {
    $styles = $this->kmlDocument->getFeature()->getStyleSelectors();

    TestCase::assertCount(1, $styles);
    TestCase::assertInstanceOf(Style::class, $styles[0]);
    $this->containsProperties($styles[0], $table);

    $this->target = $styles[0];
  }

  /**
   * @Then the Style should contain a :subStyle with the following properties:
   */
  public function theStyleShouldContainABalloonstyleWithTheFollowingProperties($subStyle, TableNode $table) {
    $subStyle = $this->target->{'get' . $subStyle}();
    $this->containsProperties($subStyle, $table);
  }

  /**
   * @Then the NetworkLinkControl should have an AbstractView with the following properties:
   */
  public function theNetworkLinkControlShouldHaveAnAbstractViewWithTheFollowingProperties(TableNode $table) {
    $networkLinkControl = $this->kmlDocument->getNetworkLinkControl();
    $containedType = $networkLinkControl->getAbstractView();
    $this->containsProperties($containedType, $table);
  }

  /**
   * @Then the feature :element should contain the following properties:
   */
  public function theFeatureElementShouldContainTheFollowingProperties(TableNode $table) {
    $this->containsProperties($this->kmlDocument->getFeature(), $table);
  }

  private function containsProperties($object, TableNode $properties) {
    foreach ($properties->getRows() as $i => $row) {
      if ($i > 0) {
        $value = $object->{"get" . ucfirst($row[0])}();

        switch ($row[1]) {
          case 'true':
            TestCase::assertTrue($value);
            break;

          case 'false':
            TestCase::assertFalse($value);
            break;

          default:
            TestCase::assertEquals($row[1], $object->{"get" . ucfirst($row[0])}());
        }
      }
    }
  }

}
