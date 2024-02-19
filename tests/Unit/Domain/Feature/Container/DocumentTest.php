<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature\Container;

use LibKml\Domain\Feature\Container\Document;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\StyleSelector\Style;
use PHPUnit\Framework\TestCase;

final class DocumentTest extends TestCase
{
    private Document $document;

    private Style $style1;
    private Style $style2;
    private array $styles = [];

    protected function setUp(): void
    {
        $this->document = new Document();
        $this->style1 = new Style();
        $this->style2 = new Style();
        $this->styles = [$this->style1, $this->style2];
    }

    public function testAccept(): void
    {
        $document = new Document();

        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitDocument')
          ->with(self::equalTo($document));

        $document->accept($objectVisitor);
    }

    public function testStylesField(): void
    {
        $this->document->setSchemas($this->styles);

        self::assertCount(2, $this->document->getSchemas());
        self::assertContains($this->style1, $this->document->getSchemas());
        self::assertContains($this->style2, $this->document->getSchemas());
    }

    public function testAddSchema(): void
    {
        $this->document->addSchema($this->style1);

        self::assertCount(1, $this->document->getSchemas());
        self::assertContains($this->style1, $this->document->getSchemas());
    }

    public function testClearSchemas(): void
    {
        $this->document->setSchemas($this->styles);

        $this->document->clearSchemas();

        self::assertCount(0, $this->document->getSchemas());
    }
}
