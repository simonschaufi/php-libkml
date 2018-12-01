<?php

namespace LibKml\Tests\Domain\Feature\ExtendedData;

use LibKml\Domain\Feature\ExtendedData\SchemaData;
use LibKml\Domain\Feature\ExtendedData\SimpleData;
use PHPUnit\Framework\TestCase;

class SchemaDataTest extends TestCase {

  /**
   * @var SchemaData
   */
  protected $schemaData;

  public function setUp() {
    $this->schemaData = new SchemaData();
  }

  public function testSchemaUrlField() {
    $schemaUrl = "http://www.google.com";

    $this->schemaData->setSchemaUrl($schemaUrl);

    $this->assertEquals($schemaUrl, $this->schemaData->getSchemaUrl());
  }

  public function testSimpleDataField() {
    $simpleDataItem1 = new SimpleData();
    $simpleDataItem2 = new SimpleData();
    $simpleData = [$simpleDataItem1, $simpleDataItem2];

    $this->schemaData->setSimpleData($simpleData);

    $this->assertCount(2, $this->schemaData->getSimpleData());
    $this->assertContains($simpleDataItem1, $this->schemaData->getSimpleData());
    $this->assertContains($simpleDataItem2, $this->schemaData->getSimpleData());
  }
  
}
