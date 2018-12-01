<?php

namespace LibKml\Tests\Domain\Feature\Container;


use LibKml\Domain\Feature\Container\Document;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\StyleSelector\Style;
use PHPUnit\Framework\TestCase;

class DocumentTest extends TestCase {

  /**
   * @var Document
   */
  protected $document;

  protected $style1;
  protected $style2;
  protected $styles;

  public function setUp() {
    $this->document = new Document();
    $this->style1 = new Style();
    $this->style2 = new Style();
    $this->styles = [$this->style1, $this->style2];
  }

  public function testAccept() {
    $document = new Document();

    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitDocument')
      ->with($this->equalTo($document));

    $document->accept($objectVisitor);
  }

  public function testStylesField() {
    $this->document->setSchemas($this->styles);

    $this->assertCount(2, $this->document->getSchemas());
    $this->assertContains($this->style1, $this->document->getSchemas());
    $this->assertContains($this->style2, $this->document->getSchemas());
  }

  public function testAddSchema() {
    $this->document->addSchema($this->style1);

    $this->assertCount(1, $this->document->getSchemas());
    $this->assertContains($this->style1, $this->document->getSchemas());
  }

  public function testClearSchemas() {
    $this->document->setSchemas($this->styles);

    $this->document->clearSchemas();

    $this->assertCount(0, $this->document->getSchemas());
  }

}
