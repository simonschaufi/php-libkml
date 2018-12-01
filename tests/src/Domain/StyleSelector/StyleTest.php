<?php

namespace LibKml\Tests\Domain\StyleSelector;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\StyleSelector\Style;
use LibKml\Domain\SubStyle\BalloonStyle;
use LibKml\Domain\SubStyle\ColorStyle\IconStyle;
use LibKml\Domain\SubStyle\ColorStyle\LabelStyle;
use LibKml\Domain\SubStyle\ColorStyle\LineStyle;
use LibKml\Domain\SubStyle\ColorStyle\PolyStyle;
use LibKml\Domain\SubStyle\ListStyle;
use PHPUnit\Framework\TestCase;

class StyleTest extends TestCase {

  /**
   * @var Style
   */
  protected $style;

  public function setUp() {
    $this->style = new Style();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitStyle')
      ->with($this->equalTo($this->style));

    $this->style->accept($objectVisitor);
  }

  public function testIconStyleField() {
    $iconStyle = new IconStyle();

    $this->style->setIconStyle($iconStyle);

    $this->assertEquals($iconStyle, $this->style->getIconStyle());
  }

  public function testLabelStyleField() {
    $labelStyle = new LabelStyle();

    $this->style->setLabelStyle($labelStyle);

    $this->assertEquals($labelStyle, $this->style->getLabelStyle());
  }

  public function testLineStyleField() {
    $lineStyle = new LineStyle();

    $this->style->setLineStyle($lineStyle);

    $this->assertEquals($lineStyle, $this->style->getLineStyle());
  }

  public function testPolyStyleField() {
    $polyStyle = new PolyStyle();

    $this->style->setPolyStyle($polyStyle);

    $this->assertEquals($polyStyle, $this->style->getPolyStyle());
  }

  public function testBalloonStyleField() {
    $balloonStyle = new BalloonStyle();

    $this->style->setBalloonStyle($balloonStyle);

    $this->assertEquals($balloonStyle, $this->style->getBalloonStyle());
  }

  public function testListStyleField() {
    $listStyle = new ListStyle();

    $this->style->setListStyle($listStyle);

    $this->assertEquals($listStyle, $this->style->getListStyle());
  }

}
