<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature\ExtendedData;

use LibKml\Domain\Feature\ExtendedData\Data;
use LibKml\Domain\Feature\ExtendedData\ExtendedData;
use LibKml\Domain\Feature\ExtendedData\Other;
use LibKml\Domain\Feature\ExtendedData\SchemaData;
use PHPUnit\Framework\TestCase;

final class ExtendedDataTest extends TestCase
{
    protected ExtendedData $extendedData;

    protected function setUp(): void
    {
        $this->extendedData = new ExtendedData();
    }

    public function testAddData(): void
    {
        $data = new Data();
        $initial = count($this->extendedData->getData());

        $this->extendedData->addData($data);

        self::assertContains($data, $this->extendedData->getData());
        self::assertCount($initial + 1, $this->extendedData->getData());
    }

    public function testClearData(): void
    {
        $data1 = new Data();
        $data2 = new Data();
        $data = [$data1, $data2];

        $this->extendedData->setData($data);

        $this->extendedData->clearData();

        self::assertCount(0, $this->extendedData->getData());
    }

    public function testDataField(): void
    {
        $data1 = new Data();
        $data2 = new Data();
        $data = [$data1, $data2];

        $this->extendedData->setData($data);

        self::assertContains($data1, $this->extendedData->getData());
        self::assertContains($data2, $this->extendedData->getData());
        self::assertCount(count($data), $this->extendedData->getData());
    }

    public function testAddSchemaData(): void
    {
        $schemaData = new SchemaData();
        $initial = count($this->extendedData->getSchemaData());

        $this->extendedData->addSchemaData($schemaData);

        self::assertContains($schemaData, $this->extendedData->getSchemaData());
        self::assertCount($initial + 1, $this->extendedData->getSchemaData());
    }

    public function testClearSchemaData(): void
    {
        $schemaData1 = new SchemaData();
        $schemaData2 = new SchemaData();
        $schemaData = [$schemaData1, $schemaData2];

        $this->extendedData->setSchemaData($schemaData);

        $this->extendedData->clearSchemaData();

        self::assertCount(0, $this->extendedData->getSchemaData());
    }

    public function testSchemaDataField(): void
    {
        $schemaData1 = new SchemaData();
        $schemaData2 = new SchemaData();
        $schemaData = [$schemaData1, $schemaData2];

        $this->extendedData->setSchemaData($schemaData);

        self::assertContains($schemaData1, $this->extendedData->getSchemaData());
        self::assertContains($schemaData2, $this->extendedData->getSchemaData());
        self::assertCount(count($schemaData), $this->extendedData->getSchemaData());
    }

    public function testOtherField(): void
    {
        $other1 = new Other();
        $other2 = new Other();
        $other = [$other1, $other2];

        $this->extendedData->setOther($other);

        self::assertContains($other1, $this->extendedData->getOther());
        self::assertContains($other2, $this->extendedData->getOther());
        self::assertCount(count($other), $this->extendedData->getOther());
    }
}
