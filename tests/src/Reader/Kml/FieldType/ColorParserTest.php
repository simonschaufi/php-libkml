<?php

namespace LibKml\Tests\Reader\Kml\FieldType;

use LibKml\Domain\FieldType\Color;
use LibKml\Reader\Kml\FieldType\ColorParser;
use PHPUnit\Framework\TestCase;

class ColorParserTest extends TestCase {

  public function testParseRgba() {
    $color = ColorParser::parse("a366ff88");

    $this->assertInstanceOf(Color::class, $color);
    $this->assertEquals(0xA3, $color->getRed());
    $this->assertEquals(0x66, $color->getGreen());
    $this->assertEquals(0xFF, $color->getBlue());
    $this->assertEquals(0.5333, $color->getAlpha(), '', 0.0001);
  }

  public function testParseRgb() {
    $color = ColorParser::parse("a366ff");

    $this->assertInstanceOf(Color::class, $color);
    $this->assertEquals(0xA3, $color->getRed());
    $this->assertEquals(0x66, $color->getGreen());
    $this->assertEquals(0xFF, $color->getBlue());
    $this->assertEquals(1, $color->getAlpha(), '', 0.0001);
  }

  public function testParseError() {
    $color = ColorParser::parse("a366");

    $this->assertNull($color);
  }

}
