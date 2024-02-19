<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Color;
use LibKml\Reader\Kml\FieldType\ColorParser;
use PHPUnit\Framework\TestCase;

final class ColorParserTest extends TestCase
{
    public function testParseRgba(): void
    {
        $color = ColorParser::parse('a366ff88');

        self::assertInstanceOf(Color::class, $color);
        self::assertEquals(0xA3, $color->getRed());
        self::assertEquals(0x66, $color->getGreen());
        self::assertEquals(0xFF, $color->getBlue());
        self::assertEqualsWithDelta(0.5333, $color->getAlpha(), 0.0001);
    }

    public function testParseRgb(): void
    {
        $color = ColorParser::parse('a366ff');

        self::assertInstanceOf(Color::class, $color);
        self::assertEquals(0xA3, $color->getRed());
        self::assertEquals(0x66, $color->getGreen());
        self::assertEquals(0xFF, $color->getBlue());
        self::assertEqualsWithDelta(1, $color->getAlpha(), 0.0001);
    }

    public function testParseError(): void
    {
        $color = ColorParser::parse('a366');

        self::assertNull($color);
    }
}
