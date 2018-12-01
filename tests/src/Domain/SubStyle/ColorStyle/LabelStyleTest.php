<?php

namespace LibKml\Tests\Domain\SubStyle\ColorStyle;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\Scale;
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
