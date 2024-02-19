<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ColorMode;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\ColorStyle\PolyStyle;
use PHPUnit\Framework\TestCase;

final class PolyStyleTest extends TestCase
{
    private PolyStyle $polyStyle;

    protected function setUp(): void
    {
        $this->polyStyle = new PolyStyle();
    }

    public function testDefaultValues(): void
    {
        self::assertEquals(Color::fromWhite(), $this->polyStyle->getColor());
        self::assertEquals(ColorMode::NORMAL, $this->polyStyle->getColorMode());
        self::assertTrue($this->polyStyle->getFill());
        self::assertTrue($this->polyStyle->getOutline());
    }

    public function testAccept(): void
    {
        $timeStamp = new PolyStyle();

        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitPolyStyle')
          ->with(self::equalTo($timeStamp));

        $timeStamp->accept($objectVisitor);
    }

    public function testFillField(): void
    {
        $fill = true;

        $this->polyStyle->setFill($fill);

        self::assertEquals($fill, $this->polyStyle->getFill());
    }

    public function testOutlineField(): void
    {
        $outline = true;

        $this->polyStyle->setOutline($outline);

        self::assertEquals($outline, $this->polyStyle->getOutline());
    }
}
