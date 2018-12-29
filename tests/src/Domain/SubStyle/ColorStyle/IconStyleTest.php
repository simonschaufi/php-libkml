<?php

namespace LibKml\Tests\Domain\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ColorMode;
use LibKml\Domain\Icon;
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

  public function testDefaultValues() {
    $this->assertEquals(Color::fromWhite(), $this->iconStyle->getColor());
    $this->assertEquals(ColorMode::NORMAL, $this->iconStyle->getColorMode());
    $this->assertEquals(1, $this->iconStyle->getScale());
    $this->assertEquals(0, $this->iconStyle->getHeading());
    $this->assertEquals(0.5, $this->iconStyle->getHotSpot()->getX());
    $this->assertEquals(0.5, $this->iconStyle->getHotSpot()->getY());
    $this->assertEquals('fraction', $this->iconStyle->getHotSpot()->getXUnits());
    $this->assertEquals('fraction', $this->iconStyle->getHotSpot()->getYUnits());
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