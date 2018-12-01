<?php

namespace LibKml\Tests\Domain\Geometry;

use LibKml\Domain\Geometry\Model;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase {

  /**
   * @var Model
   */
  protected $model;

  public function setUp() {
    $this->model = new Model();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitModel')
      ->with($this->equalTo($this->model));

    $this->model->accept($objectVisitor);
  }

  public function testAltitudeModeField() {
    $altitudeMode = "relativeToGround";

    $this->model->setAltitudeMode($altitudeMode);

    $this->assertEquals($altitudeMode, $this->model->getAltitudeMode());
  }

}
