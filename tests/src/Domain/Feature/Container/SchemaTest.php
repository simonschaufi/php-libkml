<?php

namespace LibKml\Tests\Domain\Feature\Container;

use LibKml\Domain\Feature\Container\Schema;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class SchemaTest extends TestCase {

  /**
   * @var Schema
   */
  protected $schema;

  protected $field1;
  protected $field2;
  protected $fields;

  public function setUp() {
    $this->schema = new Schema();
    $this->fields = [$this->field1, $this->field2];
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitSchema')
      ->with($this->equalTo($this->schema));

    $this->schema->accept($objectVisitor);
  }

  public function testFieldsField() {
    $this->schema->setFields($this->fields);

    $this->assertCount(2, $this->schema->getFields());
    $this->assertContains($this->field1, $this->schema->getFields());
    $this->assertContains($this->field2, $this->schema->getFields());
  }

  public function testAddField() {
    $this->schema->addField($this->field1);

    $this->assertCount(1, $this->schema->getFields());
    $this->assertContains($this->field1, $this->schema->getFields());
  }

  public function testClearFields() {
    $this->schema->setFields($this->fields);

    $this->schema->clearFields();

    $this->assertCount(0, $this->schema->getFields());
  }

}
