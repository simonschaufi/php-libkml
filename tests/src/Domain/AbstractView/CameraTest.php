<?php

namespace LibKml\Tests\Domain\AbstractView;

use LibKml\Domain\AbstractView\Camera;
use LibKml\Domain\KmlObjectVisitorInterface;
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

}
