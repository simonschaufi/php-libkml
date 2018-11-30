<?php

namespace LibKml\Tests\Domain\Feature\Container;

use LibKml\Domain\Feature\Container\SimpleField;
use PHPUnit\Framework\TestCase;

class SimpleFieldTest extends TestCase {

  /**
   * @var SimpleField
   */
  protected $simpleField;
  
  public function setUp() {
    $this->simpleField = new SimpleField();
  }

  public function testNameField() {
    $name = "London Bridge";

    $this->simpleField->setName($name);

    $this->assertEquals($name, $this->simpleField->getName());
  }

  public function testTypeField() {
    $type = "London Bridge";

    $this->simpleField->setType($type);

    $this->assertEquals($type, $this->simpleField->getType());
  }

  public function testDisplayNameField() {
    $displayName = "London Bridge";

    $this->simpleField->setDisplayName($displayName);

    $this->assertEquals($displayName, $this->simpleField->getDisplayName());
  }

}
