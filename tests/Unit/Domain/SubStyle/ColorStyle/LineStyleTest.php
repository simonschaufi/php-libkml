<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ColorMode;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\ColorStyle\LineStyle;
use PHPUnit\Framework\TestCase;

final class LineStyleTest extends TestCase
{
    private LineStyle $lineStyle;

    protected function setUp(): void
    {
        $this->lineStyle = new LineStyle();
    }

    public function testDefaultValues(): void
    {
        self::assertEquals(Color::fromWhite(), $this->lineStyle->getColor());
        self::assertEquals(ColorMode::NORMAL, $this->lineStyle->getColorMode());
        self::assertEquals(1, $this->lineStyle->getWidth());
    }

    public function testAccept(): void
    {
        $timeStamp = new LineStyle();

        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitLineStyle')
          ->with(self::equalTo($timeStamp));

        $timeStamp->accept($objectVisitor);
    }

    public function testWidthField(): void
    {
        $width = 345;

        $this->lineStyle->setWidth($width);

        self::assertEquals($width, $this->lineStyle->getWidth());
    }
}
