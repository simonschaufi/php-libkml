<?php

namespace LibKml\Tests\Domain\SubStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\BalloonStyle;
use PHPUnit\Framework\TestCase;

class BalloonStyleTest extends TestCase {

  /**
   * @var BalloonStyle
   */
  protected $balloonStyle;

  public function setUp() {
    $this->balloonStyle = new BalloonStyle();
  }

  public function testAccept() {
    $timeStamp = new BalloonStyle();

    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitBalloonStyle')
      ->with($this->equalTo($timeStamp));

    $timeStamp->accept($objectVisitor);
  }

  public function testBgColorField() {
    $bgColor = new Color();

    $this->balloonStyle->setBgColor($bgColor);

    $this->assertEquals($bgColor, $this->balloonStyle->getBgColor());
  }

  public function testTextColorField() {
    $textColor = new Color();

    $this->balloonStyle->setTextColor($textColor);

    $this->assertEquals($textColor, $this->balloonStyle->getTextColor());
  }

  public function testTextField() {
    $text = "Balloon text";

    $this->balloonStyle->setText($text);

    $this->assertEquals($text, $this->balloonStyle->getText());
  }

  public function testDisplayModeField() {
    $displayMode = "hide";

    $this->balloonStyle->setDisplayMode($displayMode);

    $this->assertEquals($displayMode, $this->balloonStyle->getDisplayMode());
  }
}
