<?php

namespace LibKml\Tests\Domain\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Icon;
use LibKml\Domain\FieldType\Vec2;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\ColorStyle\IconStyle;
use PHPUnit\Framework\TestCase;

class IconStyleTest extends TestCase {

  /**
   * @var IconStyle
   */
  protected $iconStyle;

  public function setUp() {
    $this->iconStyle = new IconStyle();
  }

  public function testAccept() {
    $timeStamp = new IconStyle();

    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitIconStyle')
      ->with($this->equalTo($timeStamp));

    $timeStamp->accept($objectVisitor);
  }

  public function testScaleField() {
    $scale = 0.478;

    $this->iconStyle->setScale($scale);

    $this->assertEquals($scale, $this->iconStyle->getScale());
  }

  public function testHeadingField() {
    $heading = 0.478;

    $this->iconStyle->setHeading($heading);

    $this->assertEquals($heading, $this->iconStyle->getHeading());
  }

  public function testIconField() {
    $icon = new Icon();

    $this->iconStyle->setIcon($icon);

    $this->assertEquals($icon, $this->iconStyle->getIcon());
  }

  public function testHotSpotField() {
    $hotSpot = new Vec2();

    $this->iconStyle->setHotSpot($hotSpot);

    $this->assertEquals($hotSpot, $this->iconStyle->getHotSpot());
  }
  
}