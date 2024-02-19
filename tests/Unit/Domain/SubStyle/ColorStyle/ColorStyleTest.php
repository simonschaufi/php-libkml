<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\ColorStyle\ColorStyle;
use PHPUnit\Framework\TestCase;

final class ColorStyleTest extends TestCase
{
    /**
     * @var ColorStyle
     */
    protected $colorStyle;

    protected function setUp(): void
    {
        $this->colorStyle = new class() extends ColorStyle {
            public function accept(KmlObjectVisitorInterface $visitor): void {}
        };
    }

    public function testColorField(): void
    {
        $color = new Color();

        $this->colorStyle->setColor($color);

        self::assertEquals($color, $this->colorStyle->getColor());
    }

    public function testColorModeField(): void
    {
        $colorMode = 'random';

        $this->colorStyle->setColorMode($colorMode);

        self::assertEquals($colorMode, $this->colorStyle->getColorMode());
    }
}
