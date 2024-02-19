<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ColorMode;
use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\ColorStyle\LabelStyle;
use LibKml\Reader\Kml\SubStyle\ColorStyle\LabelStyleParser;
use PHPUnit\Framework\TestCase;

final class LabelStyleParserTest extends TestCase
{
    private const KML_LABEL_STYLE = <<<'TAG'
<LabelStyle id="ID">
  <color>ffaabbcc</color>
  <colorMode>random</colorMode>
  <scale>0.75</scale>
</LabelStyle>
TAG;

    private LabelStyleParser $labelStyleParser;

    /**
     * @var LabelStyle
     */
    private KmlObject $labelStyle;

    protected function setUp(): void
    {
        $this->labelStyleParser = new LabelStyleParser();
        $this->labelStyle = $this->labelStyleParser->parse(simplexml_load_string(self::KML_LABEL_STYLE));
    }

    public function testColor(): void
    {
        $color = Color::fromRGBA(0xcc, 0xbb, 0xaa, 0xff / 0xff);

        self::assertEquals($color, $this->labelStyle->getColor());
    }

    public function testColorMode(): void
    {
        self::assertEquals(ColorMode::RANDOM, $this->labelStyle->getColorMode());
    }

    public function testScale(): void
    {
        self::assertEquals(0.75, $this->labelStyle->getScale());
    }
}
