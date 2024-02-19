<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ColorMode;
use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\ColorStyle\LineStyle;
use LibKml\Reader\Kml\SubStyle\ColorStyle\LineStyleParser;
use PHPUnit\Framework\TestCase;

final class LineStyleParserTest extends TestCase
{
    private const KML_LINE_STYLE = <<<'TAG'
<LineStyle id="ID">
  <color>ffaabbcc</color>
  <colorMode>random</colorMode>
  <width>2.5</width>
</LineStyle>
TAG;

    /**
     * @var LineStyle
     */
    private KmlObject $lineStyle;

    protected function setUp(): void
    {
        $lineStyleParser = new LineStyleParser();
        $this->lineStyle = $lineStyleParser->parse(simplexml_load_string(self::KML_LINE_STYLE));
    }

    public function testColor(): void
    {
        $color = Color::fromRGBA(0xcc, 0xbb, 0xaa, 0xff / 0xff);

        self::assertEquals($color, $this->lineStyle->getColor());
    }

    public function testColorMode(): void
    {
        self::assertEquals(ColorMode::RANDOM, $this->lineStyle->getColorMode());
    }

    public function testWidth(): void
    {
        self::assertEquals(2.5, $this->lineStyle->getWidth());
    }
}
