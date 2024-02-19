<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ColorMode;
use LibKml\Domain\FieldType\Vec2;
use LibKml\Domain\Icon;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\ColorStyle\IconStyle;
use PHPUnit\Framework\TestCase;

final class IconStyleTest extends TestCase
{
    private IconStyle $iconStyle;

    protected function setUp(): void
    {
        $this->iconStyle = new IconStyle();
    }

    public function testAccept(): void
    {
        $timeStamp = new IconStyle();

        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitIconStyle')
          ->with(self::equalTo($timeStamp));

        $timeStamp->accept($objectVisitor);
    }

    public function testDefaultValues(): void
    {
        self::assertEquals(Color::fromWhite(), $this->iconStyle->getColor());
        self::assertEquals(ColorMode::NORMAL, $this->iconStyle->getColorMode());
        self::assertEquals(1, $this->iconStyle->getScale());
        self::assertEquals(0, $this->iconStyle->getHeading());
        self::assertEquals(0.5, $this->iconStyle->getHotSpot()->getX());
        self::assertEquals(0.5, $this->iconStyle->getHotSpot()->getY());
        self::assertEquals('fraction', $this->iconStyle->getHotSpot()->getXUnits());
        self::assertEquals('fraction', $this->iconStyle->getHotSpot()->getYUnits());
    }

    public function testScaleField(): void
    {
        $scale = 0.478;

        $this->iconStyle->setScale($scale);

        self::assertEquals($scale, $this->iconStyle->getScale());
    }

    public function testHeadingField(): void
    {
        $heading = 0.478;

        $this->iconStyle->setHeading($heading);

        self::assertEquals($heading, $this->iconStyle->getHeading());
    }

    public function testIconField(): void
    {
        $icon = new Icon();

        $this->iconStyle->setIcon($icon);

        self::assertEquals($icon, $this->iconStyle->getIcon());
    }

    public function testHotSpotField(): void
    {
        $hotSpot = new Vec2();

        $this->iconStyle->setHotSpot($hotSpot);

        self::assertEquals($hotSpot, $this->iconStyle->getHotSpot());
    }
}
