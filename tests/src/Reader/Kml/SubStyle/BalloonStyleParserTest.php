<?php

namespace LibKml\Tests\Reader\Kml\SubStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\DisplayModeEnum;
use LibKml\Domain\SubStyle\BalloonStyle;
use LibKml\Reader\Kml\SubStyle\BalloonStyleParser;
use PHPUnit\Framework\TestCase;

class BalloonStyleParserTest extends TestCase {

  const KML_BALLOON_STYLE = <<<'TAG'
<BalloonStyle>
  <bgColor>ffffffbb</bgColor>
  <textColor>ff00aabb</textColor>
  <text>$[name]</text>
  <displayMode>random</displayMode>
</BalloonStyle>
TAG;

  /**
   * @var BalloonStyleParser
   */
  protected $balloonStyleParser;

  protected $balloonStyleKmlElement;

  /**
   * @var BalloonStyle
   */
  protected $balloonStyle;

  public function setUp() {
    $this->balloonStyleParser = new BalloonStyleParser();
    $this->balloonStyleKmlElement = simplexml_load_string(self::KML_BALLOON_STYLE);
    $this->balloonStyle = $this->balloonStyleParser->parse($this->balloonStyleKmlElement);
  }

  public function testBgColor() {
    $color = Color::fromRGBA(0xbb, 0xff, 0xff, 1);

    $this->assertEquals($color, $this->balloonStyle->getBgColor());
  }

  public function testTextColor() {
    $color = Color::fromRGBA(0xbb, 0xaa, 0x00, 1);

    $this->assertEquals($color, $this->balloonStyle->getTextColor());
  }

  public function testText() {
    $this->assertEquals('$[name]', $this->balloonStyle->getText());
  }

  public function testDisplayMode() {
    $this->assertEquals(DisplayModeEnum::RANDOM, $this->balloonStyle->getDisplayMode());
  }

}
