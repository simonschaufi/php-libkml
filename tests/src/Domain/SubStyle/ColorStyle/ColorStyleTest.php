<?php

namespace LibKml\Tests\Domain\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\ColorStyle\ColorStyle;
use PHPUnit\Framework\TestCase;

class ColorStyleTest extends TestCase {

  /**
   * @var ColorStyle
   */
  protected $colorStyle;

  public function setUp() {
    $this->colorStyle = new class extends ColorStyle {
      public function accept(KmlObjectVisitorInterface $visitor): void {
      }
    };
  }

  public function testColorField() {
    $color = new Color();

    $this->colorStyle->setColor($color);

    $this->assertEquals($color, $this->colorStyle->getColor());
  }

  public function testColorModeField() {
    $colorMode = "random";

    $this->colorStyle->setColorMode($colorMode);

    $this->assertEquals($colorMode, $this->colorStyle->getColorMode());
  }

}
