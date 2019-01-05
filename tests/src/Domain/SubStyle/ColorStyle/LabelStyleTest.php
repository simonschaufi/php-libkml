<?php

namespace LibKml\Tests\Domain\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ColorMode;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\ColorStyle\LabelStyle;
use PHPUnit\Framework\TestCase;

class LabelStyleTest extends TestCase {

  /**
   * @var LabelStyle
   */
  protected $labelStyle;

  public function setUp() {
    $this->labelStyle = new LabelStyle();
  }

  public function testDefaultValues() {
    $this->assertEquals(Color::fromWhite(), $this->labelStyle->getColor());
    $this->assertEquals(ColorMode::NORMAL, $this->labelStyle->getColorMode());
    $this->assertEquals(1, $this->labelStyle->getScale());
  }

  public function testScaleField() {
    $scale = 3.75;

    $this->labelStyle->setScale($scale);

    $this->assertEquals($scale, $this->labelStyle->getScale());
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitLabelStyle')
      ->with($this->equalTo($this->labelStyle));

    $this->labelStyle->accept($objectVisitor);
  }

}
