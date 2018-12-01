<?php

namespace LibKml\Tests\Domain\Feature\ExtendedData;

use LibKml\Domain\Feature\ExtendedData\Data;
use LibKml\Domain\Feature\ExtendedData\ExtendedData;
use LibKml\Domain\Feature\ExtendedData\Other;
use LibKml\Domain\Feature\ExtendedData\SchemaData;
use PHPUnit\Framework\TestCase;

class ExtendedDataTest extends TestCase {

  /**
   * @var ExtendedData
   */
  protected $extendedData;

  public function setUp() {
    $this->extendedData = new ExtendedData();
  }

  public function testAddData() {
    $data = new Data();
    $initial = count($this->extendedData->getData());

    $this->extendedData->addData($data);

    $this->assertContains($data, $this->extendedData->getData());
    $this->assertCount($initial + 1, $this->extendedData->getData());
  }

  public function testClearData() {
    $data1 = new Data();
    $data2 = new Data();
    $data = [$data1, $data2];

    $this->extendedData->setData($data);

    $this->extendedData->clearData();

    $this->assertCount(0, $this->extendedData->getData());
  }

  public function testDataField() {
    $data1 = new Data();
    $data2 = new Data();
    $data = [$data1, $data2];

    $this->extendedData->setData($data);

    $this->assertContains($data1, $this->extendedData->getData());
    $this->assertContains($data2, $this->extendedData->getData());
    $this->assertCount(count($data), $this->extendedData->getData());
  }

  public function testAddSchemaData() {
    $schemaData = new SchemaData();
    $initial = count($this->extendedData->getSchemaData());

    $this->extendedData->addSchemaData($schemaData);

    $this->assertContains($schemaData, $this->extendedData->getSchemaData());
    $this->assertCount($initial + 1, $this->extendedData->getSchemaData());
  }

  public function testClearSchemaData() {
    $schemaData1 = new SchemaData();
    $schemaData2 = new SchemaData();
    $schemaData = [$schemaData1, $schemaData2];

    $this->extendedData->setSchemaData($schemaData);

    $this->extendedData->clearSchemaData();

    $this->assertCount(0, $this->extendedData->getSchemaData());
  }

  public function testSchemaDataField() {
    $schemaData1 = new SchemaData();
    $schemaData2 = new SchemaData();
    $schemaData = [$schemaData1, $schemaData2];

    $this->extendedData->setSchemaData($schemaData);

    $this->assertContains($schemaData1, $this->extendedData->getSchemaData());
    $this->assertContains($schemaData2, $this->extendedData->getSchemaData());
    $this->assertCount(count($schemaData), $this->extendedData->getSchemaData());
  }

  public function testOtherField() {
    $other1 = new Other();
    $other2 = new Other();
    $other = [$other1, $other2];

    $this->extendedData->setOther($other);

    $this->assertContains($other1, $this->extendedData->getOther());
    $this->assertContains($other2, $this->extendedData->getOther());
    $this->assertCount(count($other), $this->extendedData->getOther());
  }
}
