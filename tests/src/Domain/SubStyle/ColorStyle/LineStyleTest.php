<?php

namespace LibKml\Tests\Domain\SubStyle\ColorStyle;


use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\ColorStyle\LineStyle;
use PHPUnit\Framework\TestCase;

class LineStyleTest extends TestCase {

  /**
   * @var LineStyle
   */
  protected $lineStyle;

  public function setUp() {
    $this->lineStyle = new LineStyle();
  }

  public function testAccept() {
    $timeStamp = new LineStyle();

    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitLineStyle')
      ->with($this->equalTo($timeStamp));

    $timeStamp->accept($objectVisitor);
  }

  public function testWidthField() {
    $width = 345;

    $this->lineStyle->setWidth($width);

    $this->assertEquals($width, $this->lineStyle->getWidth());
  }

}
