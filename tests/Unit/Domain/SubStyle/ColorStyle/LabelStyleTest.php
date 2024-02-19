<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ColorMode;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\ColorStyle\LabelStyle;
use PHPUnit\Framework\TestCase;

final class LabelStyleTest extends TestCase
{
    private LabelStyle $labelStyle;

    protected function setUp(): void
    {
        $this->labelStyle = new LabelStyle();
    }

    public function testDefaultValues(): void
    {
        self::assertEquals(Color::fromWhite(), $this->labelStyle->getColor());
        self::assertEquals(ColorMode::NORMAL, $this->labelStyle->getColorMode());
        self::assertEquals(1, $this->labelStyle->getScale());
    }

    public function testScaleField(): void
    {
        $scale = 3.75;

        $this->labelStyle->setScale($scale);

        self::assertEquals($scale, $this->labelStyle->getScale());
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitLabelStyle')
          ->with(self::equalTo($this->labelStyle));

        $this->labelStyle->accept($objectVisitor);
    }
}
