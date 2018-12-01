<?php

namespace LibKml\Tests\Domain\Feature\ExtendedData;

use LibKml\Domain\Feature\ExtendedData\Data;
use PHPUnit\Framework\TestCase;

class DataTest extends TestCase {

  /**
   * @var Data
   */
  protected $data;
  
  public function setUp() {
    $this->data = new Data();
  }

  public function testNameField() {
    $name = "Location";

    $this->data->setName($name);

    $this->assertEquals($name, $this->data->getName());
  }

  public function testValueField() {
    $value = "London Bridge";

    $this->data->setValue($value);

    $this->assertEquals($value, $this->data->getValue());
  }

  public function testDisplayNameField() {
    $displayName = "London Bridge";

    $this->data->setDisplayName($displayName);

    $this->assertEquals($displayName, $this->data->getDisplayName());
  }

}
