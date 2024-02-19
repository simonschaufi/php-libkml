<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\FieldType;

use LibKml\Domain\FieldType\Color;
use PHPUnit\Framework\TestCase;

final class ColorTest extends TestCase
{
    private Color $color;

    protected function setUp(): void
    {
        $this->color = new Color();
    }

    public function testDefaultValues(): void
    {
        self::assertEquals(0, $this->color->getRed());
        self::assertEquals(0, $this->color->getGreen());
        self::assertEquals(0, $this->color->getBlue());
        self::assertEquals(1, $this->color->getAlpha());
    }

    public function testFromBlack(): void
    {
        $this->color = Color::fromBlack();

        self::assertEquals(0, $this->color->getRed());
        self::assertEquals(0, $this->color->getGreen());
        self::assertEquals(0, $this->color->getBlue());
        self::assertEquals(1, $this->color->getAlpha());
    }

    public function testFromWhite(): void
    {
        $this->color = Color::fromWhite();

        self::assertEquals(0xFF, $this->color->getRed());
        self::assertEquals(0xFF, $this->color->getGreen());
        self::assertEquals(0xFF, $this->color->getBlue());
        self::assertEquals(1, $this->color->getAlpha());
    }

    public function testFromRGBA(): void
    {
        $red = 0xBB;
        $green = 0xA2;
        $blue = 0x34;
        $alpha = 0.78;

        $this->color = Color::fromRGBA($red, $green, $blue, $alpha);

        self::assertEquals($red, $this->color->getRed());
        self::assertEquals($green, $this->color->getGreen());
        self::assertEquals($blue, $this->color->getBlue());
        self::assertEquals($alpha, $this->color->getAlpha());
    }

    public function testRedField(): void
    {
        $red = 125;

        $this->color->setRed($red);

        self::assertEquals($red, $this->color->getRed());
    }

    public function testGreenField(): void
    {
        $green = 125;

        $this->color->setGreen($green);

        self::assertEquals($green, $this->color->getGreen());
    }

    public function testBlueField(): void
    {
        $blue = 125;

        $this->color->setBlue($blue);

        self::assertEquals($blue, $this->color->getBlue());
    }

    public function testAlphaField(): void
    {
        $alpha = 125;

        $this->color->setAlpha($alpha);

        self::assertEquals($alpha, $this->color->getAlpha());
    }
}
