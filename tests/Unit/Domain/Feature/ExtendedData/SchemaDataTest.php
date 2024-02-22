<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature\ExtendedData;

use LibKml\Domain\Feature\ExtendedData\SchemaData;
use LibKml\Domain\Feature\ExtendedData\SimpleData;
use PHPUnit\Framework\TestCase;

final class SchemaDataTest extends TestCase
{
    private SchemaData $schemaData;

    protected function setUp(): void
    {
        $this->schemaData = new SchemaData();
    }

    public function testSchemaUrlField(): void
    {
        $schemaUrl = 'http://www.google.com';

        $this->schemaData->setSchemaUrl($schemaUrl);

        self::assertEquals($schemaUrl, $this->schemaData->getSchemaUrl());
    }

    public function testSimpleDataField(): void
    {
        $simpleDataItem1 = new SimpleData();
        $simpleDataItem2 = new SimpleData();
        $simpleData = [$simpleDataItem1, $simpleDataItem2];

        $this->schemaData->setSimpleData($simpleData);

        self::assertCount(2, $this->schemaData->getSimpleData());
        self::assertContains($simpleDataItem1, $this->schemaData->getSimpleData());
        self::assertContains($simpleDataItem2, $this->schemaData->getSimpleData());
    }
}
