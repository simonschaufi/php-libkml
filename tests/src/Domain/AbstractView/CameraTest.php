<?php

namespace LibKml\Tests\Domain\AbstractView;

use LibKml\Domain\AbstractView\Camera;
use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\TimePrimitive\TimeStamp;
use PHPUnit\Framework\TestCase;

class CameraTest extends TestCase {

  /**
   * @var Camera
   */
  protected $camera;

  public function setUp() {
    $this->camera = new Camera();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitCamera')
      ->with($this->equalTo($this->camera));

    $this->camera->accept($objectVisitor);
  }

  public function testDefaultValues() {
    $this->assertEquals(0, $this->camera->getRoll());
  }

  public function testRollField() {
    $roll = 100.1;

    $this->camera->setRoll($roll);

    $this->assertEquals($roll, $this->camera->getRoll());
  }

  public function testAltitudeModeField() {
    $altitudeMode = AltitudeMode::ABSOLUTE;

    $this->camera->setAltitudeMode($altitudeMode);

    $this->assertEquals($altitudeMode, $this->camera->getAltitudeMode());
  }

  public function testTimePrimitive() {
    $timeStamp = TimeStamp::fromInteger(time());

    $this->camera->setTimePrimitive($timeStamp);

    $this->assertEquals($timeStamp, $this->camera->getTimePrimitive());
  }

}
