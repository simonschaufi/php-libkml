<?php
/**
 * Created by PhpStorm.
 * User: xavier
 * Date: 30/11/18
 * Time: 15:52
 */

namespace LibKml\Tests\Domain\Feature;


use LibKml\Domain\Feature\Feature;
use LibKml\Domain\FieldType\Atom\Author;
use LibKml\Domain\KmlObjectVisitor;
use PHPUnit\Framework\TestCase;

class FeatureTest extends TestCase {

  /**
   * @var Feature
   */
  protected $feature;

  public function setUp() {
    $this->feature = new class extends Feature {
      public function accept(KmlObjectVisitor $visitor) {
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


}
