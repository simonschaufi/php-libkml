<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\FieldType;

use LibKml\Domain\FieldType\Schema;
use PHPUnit\Framework\TestCase;

final class SchemaTest extends TestCase
{
    /**
     * @var Schema
     */
    protected $schema;

    protected $field1;
    protected $field2;
    protected $fields;

    protected function setUp(): void
    {
        $this->schema = new Schema();
        $this->fields = [$this->field1, $this->field2];
    }

    public function testFieldId(): void
    {
        $id = 'schema-1';

        $this->schema->setId($id);

        self::assertEquals($id, $this->schema->getId());
    }

    public function testFieldName(): void
    {
        $name = 'TrailHeadType';

        $this->schema->setName($name);

        self::assertEquals($name, $this->schema->getName());
    }

    public function testFieldsField(): void
    {
        $this->schema->setFields($this->fields);

        self::assertCount(2, $this->schema->getFields());
        self::assertContains($this->field1, $this->schema->getFields());
        self::assertContains($this->field2, $this->schema->getFields());
    }

    public function testAddField(): void
    {
        $this->schema->addField($this->field1);

        self::assertCount(1, $this->schema->getFields());
        self::assertContains($this->field1, $this->schema->getFields());
    }

    public function testClearFields(): void
    {
        $this->schema->setFields($this->fields);

        $this->schema->clearFields();

        self::assertCount(0, $this->schema->getFields());
    }
}
