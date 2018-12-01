<?php

namespace LibKml\Tests\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\GroundOverlay;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\LatLonBox;
use PHPUnit\Framework\TestCase;

class GroundOverlayTest extends TestCase {

  /**
   * @var GroundOverlay
   */
  protected $groundOverlay;

  public function setUp() {
    $this->groundOverlay = new GroundOverlay();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitGroundOverlay')
      ->with($this->equalTo($this->groundOverlay));

    $this->groundOverlay->accept($objectVisitor);
  }

  public function testAltitudeField() {
    $altitude = 125;

    $this->groundOverlay->setAltitude($altitude);

    $this->assertEquals($altitude, $this->groundOverlay->getAltitude());
  }

  public function testAltitudeModeField() {
    $altitudeMode = "clampToGround";

    $this->groundOverlay->setAltitudeMode($altitudeMode);

    $this->assertEquals($altitudeMode, $this->groundOverlay->getAltitudeMode());
  }

  public function testLatLonBoxField() {
    $latLonBox = new LatLonBox();

    $this->groundOverlay->setLatLonBox($latLonBox);

    $this->assertEquals($latLonBox, $this->groundOverlay->getLatLonBox());
  }
}
