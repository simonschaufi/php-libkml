<?php

namespace LibKml\Tests\Domain\Feature\ExtendedData;

use LibKml\Domain\Feature\ExtendedData\SimpleData;
use PHPUnit\Framework\TestCase;

class SimpleDataTest extends TestCase {

  /**
   * @var SimpleData
   */
  protected $simpleData;

  public function setUp() {
    $this->simpleData = new SimpleData();
  }

  public function testNameField() {
    $name = "Location";

    $this->simpleData->setName($name);

    $this->assertEquals($name, $this->simpleData->getName());
  }

  public function testValueField() {
    $value = "London Bridge";

    $this->simpleData->setValue($value);

    $this->assertEquals($value, $this->simpleData->getValue());
  }

}
