<?php

namespace LibKml\Tests\Domain\Feature;


use LibKml\Domain\Feature\Feature;
use LibKml\Domain\FieldType\Atom\Author;
use LibKml\Domain\KmlObjectVisitorInterface;
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

  public function testAuthorField() {
    $author = new Author();
    $author->setName("John Smith");

    $this->feature->setAuthor($author);

    $this->assertEquals($author, $this->feature->getAuthor());
  }

  public function testAddressField() {
    $address = "Blackfriards 240";

    $this->feature->setAddress($address);

    $this->assertEquals($address, $this->feature->getAddress());
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

}
