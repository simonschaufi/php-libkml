<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\SubStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\DisplayModeEnum;
use LibKml\Domain\KmlObject;
use LibKml\Domain\SubStyle\BalloonStyle;
use LibKml\Reader\Kml\SubStyle\BalloonStyleParser;
use PHPUnit\Framework\TestCase;

final class BalloonStyleParserTest extends TestCase
{
    private const KML_BALLOON_STYLE = <<<'TAG'
<BalloonStyle>
  <bgColor>ffffffbb</bgColor>
  <textColor>ff00aabb</textColor>
  <text>$[name]</text>
  <displayMode>random</displayMode>
</BalloonStyle>
TAG;

    /**
     * @var BalloonStyle
     */
    private KmlObject $balloonStyle;

    protected function setUp(): void
    {
        $balloonStyleParser = new BalloonStyleParser();
        $this->balloonStyle = $balloonStyleParser->parse(simplexml_load_string(self::KML_BALLOON_STYLE));
    }

    public function testBgColor(): void
    {
        $color = Color::fromRGBA(0xbb, 0xff, 0xff, 1);

        self::assertEquals($color, $this->balloonStyle->getBgColor());
    }

    public function testTextColor(): void
    {
        $color = Color::fromRGBA(0xbb, 0xaa, 0x00, 1);

        self::assertEquals($color, $this->balloonStyle->getTextColor());
    }

    public function testText(): void
    {
        self::assertEquals('$[name]', $this->balloonStyle->getText());
    }

    public function testDisplayMode(): void
    {
        self::assertEquals(DisplayModeEnum::RANDOM, $this->balloonStyle->getDisplayMode());
    }
}
