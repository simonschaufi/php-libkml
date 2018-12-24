<?php

namespace LibKml\Tests\Domain\Feature;

use LibKml\Domain\AbstractView\AbstractView;
use LibKml\Domain\Feature\ExtendedData\ExtendedData;
use LibKml\Domain\Feature\Feature;
use LibKml\Domain\FieldType\Atom\Author;
use LibKml\Domain\FieldType\Atom\Link;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\Region;
use LibKml\Domain\StyleSelector\StyleSelector;
use LibKml\Domain\TimePrimitive\TimePrimitive;
use PHPUnit\Framework\TestCase;

class FeatureTest extends TestCase {

  /**
   * @var Feature
   */
  protected $feature;

  public function setUp() {
    $this->feature = new class extends Feature {
      public function accept(KmlObjectVisitorInterface $visitor): void {
      }
    };
  }

  public function testNameField() {
    $name = "London Bridge";

    $this->feature->setName($name);

    $this->assertEquals($name, $this->feature->getName());
  }

  public function testVisibilityField() {
    $visibility = true;

    $this->feature->setVisibility($visibility);

    $this->assertEquals($visibility, $this->feature->getVisibility());
  }

  public function testOpenField() {
    $open = true;

    $this->feature->setOpen($open);

    $this->assertEquals($open, $this->feature->getOpen());
  }

  public function testAtomAuthorField() {
    $author = new Author();
    $author->setName("John Smith");

    $this->feature->setAtomAuthor($author);

    $this->assertEquals($author, $this->feature->getAtomAuthor());
  }

  public function testAddressField() {
    $address = "Blackfriards 240";

    $this->feature->setAddress($address);

    $this->assertEquals($address, $this->feature->getAddress());
  }

  public function testAtomLinkField() {
    $link = new Link();

    $this->feature->setAtomLink($link);

    $this->assertEquals($link, $this->feature->getAtomLink());
  }

  public function testPhoneNumberField() {
    $phoneNumber = "tel:+449999999999";

    $this->feature->setPhoneNumber($phoneNumber);

    $this->assertEquals($phoneNumber, $this->feature->getPhoneNumber());
  }

  public function testSnippetField() {
    $snippet = "London Bridge";

    $this->feature->setSnippet($snippet);

    $this->assertEquals($snippet, $this->feature->getSnippet());
  }

  public function testDescriptionField() {
    $description = "London Bridge";

    $this->feature->setDescription($description);

    $this->assertEquals($description, $this->feature->getDescription());
  }

  public function testAbstractViewField() {
    $abstractView = new class extends AbstractView {
      public function accept(KmlObjectVisitorInterface $visitor): void {
      }
    };

    $this->feature->setAbstractView($abstractView);

    $this->assertEquals($abstractView, $this->feature->getAbstractView());
  }

  public function testTimePrimitiveField() {
    $timePrimitive = new class extends TimePrimitive {
      public function accept(KmlObjectVisitorInterface $visitor): void {
      }
    };

    $this->feature->setTimePrimitive($timePrimitive);

    $this->assertEquals($timePrimitive, $this->feature->getTimePrimitive());
  }

  public function testStyleUrlField() {
    $styleUrl = "http://someserver.com/somestylefile.xml#restaurant";

    $this->feature->setStyleUrl($styleUrl);

    $this->assertEquals($styleUrl, $this->feature->getStyleUrl());
  }

  public function testStyleSelectorField() {
    $styleSelector1 = new class extends StyleSelector {
      public function accept(KmlObjectVisitorInterface $visitor): void {
      }
    };

    $styleSelector2 = new class extends StyleSelector {
      public function accept(KmlObjectVisitorInterface $visitor): void {
      }
    };

    $styleSelectors = [$styleSelector1, $styleSelector2];

    $this->feature->setStyleSelectors($styleSelectors);

    $this->assertCount(2, $this->feature->getStyleSelectors());
    $this->assertContains($styleSelector1, $this->feature->getStyleSelectors());
    $this->assertContains($styleSelector2, $this->feature->getStyleSelectors());
  }

  public function testAddStyleSelector() {
    $styleSelector = new class extends StyleSelector {
      public function accept(KmlObjectVisitorInterface $visitor): void {
      }
    };
    $initial = count($this->feature->getStyleSelectors());

    $this->feature->addStyleSelector($styleSelector);

    $this->assertContains($styleSelector, $this->feature->getStyleSelectors());
    $this->assertCount($initial + 1, $this->feature->getStyleSelectors());
  }

  public function testClearStyleSelector() {
    $styleSelector1 = new class extends StyleSelector {
      public function accept(KmlObjectVisitorInterface $visitor): void {
      }
    };
    $styleSelector2 = new class extends StyleSelector {
      public function accept(KmlObjectVisitorInterface $visitor): void {
      }
    };
    $styleSelector = [$styleSelector1, $styleSelector2];

    $this->feature->setStyleSelectors($styleSelector);

    $this->feature->clearStyleSelectors();

    $this->assertCount(0, $this->feature->getStyleSelectors());
  }

  public function testRegionField() {
    $region = new Region();

    $this->feature->setRegion($region);

    $this->assertEquals($region, $this->feature->getRegion());
  }

  public function testExtendedDataField() {
    $extendedData = new ExtendedData();

    $this->feature->setExtendedData($extendedData);

    $this->assertEquals($extendedData, $this->feature->getExtendedData());
  }
}
