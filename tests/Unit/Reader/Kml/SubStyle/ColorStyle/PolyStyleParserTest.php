<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ColorMode;
use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\ColorStyle\PolyStyle;
use LibKml\Reader\Kml\SubStyle\ColorStyle\PolyStyleParser;
use PHPUnit\Framework\TestCase;

final class PolyStyleParserTest extends TestCase
{
    private const KML_POLY_STYLE = <<<'TAG'
<PolyStyle id="ID">
  <color>ffaabbcc</color>
  <colorMode>random</colorMode>
  <fill>0</fill>
  <outline>0</outline>
</PolyStyle>
TAG;

    /**
     * @var PolyStyle
     */
    private KmlObject $polyStyle;

    protected function setUp(): void
    {
        $polyStyleParser = new PolyStyleParser();
        $this->polyStyle = $polyStyleParser->parse(simplexml_load_string(self::KML_POLY_STYLE));
    }

    public function testColor(): void
    {
        $color = Color::fromRGBA(0xcc, 0xbb, 0xaa, 0xff / 0xff);

        self::assertEquals($color, $this->polyStyle->getColor());
    }

    public function testColorMode(): void
    {
        self::assertEquals(ColorMode::RANDOM, $this->polyStyle->getColorMode());
    }

    public function testFill(): void
    {
        self::assertFalse($this->polyStyle->getFill());
    }

    public function testOutline(): void
    {
        self::assertFalse($this->polyStyle->getOutline());
    }
}
