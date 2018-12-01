<?php

namespace LibKml\Tests\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\ScreenOverlay;
use LibKml\Domain\FieldType\Vec2;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class ScreenOverlayTest extends TestCase {

  /**
   * @var ScreenOverlay
   */
  protected $screenOverlay;

  public function setUp() {
    $this->screenOverlay = new ScreenOverlay();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitScreenOverlay')
      ->with($this->equalTo($this->screenOverlay));

    $this->screenOverlay->accept($objectVisitor);
  }


  public function testRotationField() {
    $rotation = 23.74;

    $this->screenOverlay->setRotation($rotation);

    $this->assertEquals($rotation, $this->screenOverlay->getRotation());
  }

  public function testOverlayXYField() {
    $overlayXY = new Vec2();

    $this->screenOverlay->setOverlayXY($overlayXY);

    $this->assertEquals($overlayXY, $this->screenOverlay->getOverlayXY());
  }

  public function testScreenXYField() {
    $screenXY = new Vec2();

    $this->screenOverlay->setScreenXY($screenXY);

    $this->assertEquals($screenXY, $this->screenOverlay->getScreenXY());
  }

  public function testRotationXYField() {
    $rotationXY = new Vec2();

    $this->screenOverlay->setRotationXY($rotationXY);

    $this->assertEquals($rotationXY, $this->screenOverlay->getRotationXY());
  }

  public function testSizeField() {
    $size = new Vec2();

    $this->screenOverlay->setSize($size);

    $this->assertEquals($size, $this->screenOverlay->getSize());
  }

}
