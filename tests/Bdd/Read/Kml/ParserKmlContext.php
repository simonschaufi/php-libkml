<?php

declare(strict_types=1);

namespace LibKml\Tests\Bdd\Read\Kml;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use LibKml\Domain\FieldType\NetworkLinkControl;
use LibKml\Domain\KmlDocument;
use LibKml\Domain\StyleSelector\Style;
use LibKml\Domain\StyleSelector\StyleSelector;
use LibKml\Domain\SubStyle\SubStyle;
use LibKml\Reader\Kml\FieldType\ColorParser;
use LibKml\Reader\KmlReader;
use PHPUnit\Framework\TestCase;

/**
 * Defines application features from the specific context
 */
final class ParserKmlContext implements Context
{
    private $target;
    private KmlReader $kmlReader;
    private KmlDocument $kmlDocument;
    private string $kmlText = '';

    public function __construct()
    {
        $this->kmlReader = new KmlReader();
    }

    /**
     * @Given a KML document with a :objectType in :arg1
     * @Given a KML document in :arg1
     */
    public function aKmlDocument($arg1): void
    {
        $this->kmlText = file_get_contents(__DIR__ . '/../../../../' . $arg1);
    }

    /**
     * @When I parse the KML document
     */
    public function iParseTheKmlDocument(): void
    {
        $this->kmlDocument = $this->kmlReader->fromString($this->kmlText);
    }

    /**
     * @Then I should get a KmlDocument object containing one NetworkLinkControl
     */
    public function iShouldGetAKmlDocumentObjectContainingOneNetworkLinkControl(): void
    {
        TestCase::assertInstanceOf(NetworkLinkControl::class, $this->kmlDocument->getNetworkLinkControl());
    }

    /**
     * @Then I should get a KmlDocument object containing one feature :featureType
     */
    public function iShouldGetAKmlDocumentObjectContainingOneFeature($featureType): void
    {
        TestCase::assertInstanceOf($featureType, $this->kmlDocument->getFeature());
        $this->target = $this->kmlDocument->getFeature();
    }

    /**
     * @Then I should get a KmlDocument object containing one Style
     */
    public function iShouldGetAKmldocumentObjectContainingOneStyle(): void
    {
        $styleSelectors = $this->kmlDocument->getFeature()->getStyleSelectors();
        TestCase::assertCount(1, $styleSelectors);
        TestCase::assertInstanceOf(StyleSelector::class, $styleSelectors[0]);

        $this->target = $styleSelectors[0];
    }

    /**
     * @Then the NetworkLinkControl should contain the following properties:
     */
    public function theNetworklinkcontrolShouldContainTheFollowingProperties(TableNode $table): void
    {
        $networkLinkControl = $this->kmlDocument->getNetworkLinkControl();
        $this->containsProperties($networkLinkControl, $table);
    }

    private function containsProperties($object, TableNode $properties): void
    {
        foreach ($properties->getRows() as $i => $row) {
            if ($i > 0) {
                $value = $object->{'get' . ucfirst($row[0])}();

                switch ($row[1]) {
                    case 'true':
                        TestCase::assertTrue($value);
                        break;

                    case 'false':
                        TestCase::assertFalse($value);
                        break;

                    default:
                        TestCase::assertEquals($row[1], $object->{'get' . ucfirst($row[0])}());
                }
            }
        }
    }

    /**
     * @Then the :subStyleName should contain the following property colors:
     */
    public function theSubStyleNameShouldContainTheFollowingPropertyColors($subStyleName, TableNode $table): void
    {
        $subStyle = $this->target->{'get' . $subStyleName}();
        $this->containsColorProperties($subStyle, $table);
    }

    private function containsColorProperties($object, TableNode $properties): void
    {
        foreach ($properties->getRows() as $i => $row) {
            if ($i > 0) {
                $color = ColorParser::parse($row[1]);
                TestCase::assertEquals($color, $object->{'get' . ucfirst($row[0])}());
            }
        }
    }

    /**
     * @Then the NetworkLinkControl should contain a Camera with a :timePrimitiveType TimePrimitive property
     */
    public function theNetworklinkcontrolShouldContainACameraWithATimeprimitiveProperty($timePrimitiveType): void
    {
        $networkLinkControl = $this->kmlDocument->getNetworkLinkControl();
        TestCase::assertNotNull($networkLinkControl->getAbstractView());

        $abstractView = $networkLinkControl->getAbstractView();
        TestCase::assertNotNull($abstractView->getTimePrimitive());

        $this->target = $abstractView->getTimePrimitive();
    }

    /**
     * @Then the feature should contain a LookAt object with the the following properties:
     */
    public function theFeatureShouldContainALookatObjectWithTheTheFollowingProperties(TableNode $table): void
    {
        $feature = $this->kmlDocument->getFeature();
        $this->containsProperties($feature->getAbstractView(), $table);
    }

    /**
     * @Then the feature should contain a Style object with the following properties:
     */
    public function theFeatureShouldContainAStyleObjectWithTheFollowingProperties(TableNode $table): void
    {
        $styles = $this->target->getStyleSelectors();

        TestCase::assertCount(1, $styles);
        TestCase::assertInstanceOf(Style::class, $styles[0]);
        $this->containsProperties($styles[0], $table);

        $this->target = $styles[0];
    }

    /**
     * @Then the Style should contain a :subStyle with the following properties:
     */
    public function theStyleShouldContainABalloonstyleWithTheFollowingProperties($subStyle, TableNode $table): void
    {
        $subStyle = $this->target->{'get' . $subStyle}();
        $this->containsProperties($subStyle, $table);
    }

    /**
     * @Then the NetworkLinkControl should have an AbstractView with the following properties:
     */
    public function theNetworkLinkControlShouldHaveAnAbstractViewWithTheFollowingProperties(TableNode $table): void
    {
        $networkLinkControl = $this->kmlDocument->getNetworkLinkControl();
        $containedType = $networkLinkControl->getAbstractView();
        $this->containsProperties($containedType, $table);
    }

    /**
     * @Then the TimeSpan object should contain the following properties:
     * @Then the TimeStamp object should contain the following properties:
     */
    public function theTimePrimitiveObjectShouldContainTheFollowingProperties(TableNode $table): void
    {
        $networkLinkControl = $this->kmlDocument->getNetworkLinkControl();
        $containedType = $networkLinkControl->getAbstractView();
        $this->containsProperties($containedType->getTimePrimitive(), $table);
    }

    /**
     * @Then the feature :element should contain the following properties:
     */
    public function theFeatureElementShouldContainTheFollowingProperties(TableNode $table): void
    {
        $this->containsProperties($this->kmlDocument->getFeature(), $table);
    }

    /**
     * @Then the Style object should contain a :subStyle object with the following properties:
     */
    public function theStyleObjectShouldContainASubStyleObjectWithTheFollowingProperties(SubStyle $subStyle, TableNode $table): void
    {
        $this->containsProperties($this->target->{'get' . $subStyle}(), $table);
    }
}
