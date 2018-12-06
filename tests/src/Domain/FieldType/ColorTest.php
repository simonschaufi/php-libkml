<?php

namespace LibKml\Tests\Domain\FieldType;

use LibKml\Domain\FieldType\Color;
use PHPUnit\Framework\TestCase;

class ColorTest extends TestCase {

  /**
   * @var Color
   */
  protected $color;

  public function setUp() {
    $this->color = new Color();
  }

  public function testDefaultValues() {
    $this->assertEquals(0, $this->color->getRed());
    $this->assertEquals(0, $this->color->getGreen());
    $this->assertEquals(0, $this->color->getBlue());
    $this->assertEquals(1, $this->color->getAlpha());
  }

  public function testFromRGBA() {
    $red = 0xBB;
    $green = 0xA2;
    $blue = 0x34;
    $alpha = 0.78;

    $this->color = Color::fromRGBA($red, $green, $blue, $alpha);
    
    $this->assertEquals($red, $this->color->getRed());
    $this->assertEquals($green, $this->color->getGreen());
    $this->assertEquals($blue, $this->color->getBlue());
    $this->assertEquals($alpha, $this->color->getAlpha());
  }

  public function testRedField() {
    $red = 125;

    $this->color->setRed($red);

    $this->assertEquals($red, $this->color->getRed());
  }

  public function testGreenField() {
    $green = 125;

    $this->color->setGreen($green);

    $this->assertEquals($green, $this->color->getGreen());
  }

  public function testBlueField() {
    $blue = 125;

    $this->color->setBlue($blue);

    $this->assertEquals($blue, $this->color->getBlue());
  }

  public function testAlphaField() {
    $alpha = 125;

    $this->color->setAlpha($alpha);

    $this->assertEquals($alpha, $this->color->getAlpha());
  }

}
