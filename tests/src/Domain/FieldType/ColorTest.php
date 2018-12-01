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
