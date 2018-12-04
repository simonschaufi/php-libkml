<?php

namespace LibKml\Tests\Domain\Geometry;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\Geometry\Point;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class PointTest extends TestCase {

  /**
   * @var Point
   */
  protected $point;

  public function setUp() {
    $this->point = new Point();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitPoint')
      ->with($this->equalTo($this->point));

    $this->point->accept($objectVisitor);
  }

  public function testExtrudeField() {
    $extrude = true;

    $this->point->setExtrude($extrude);

    $this->assertEquals($extrude, $this->point->getExtrude());
  }

  public function testAltitudeModeField() {
    $altitudeMode = "relativeToGround";

    $this->point->setAltitudeMode($altitudeMode);

    $this->assertEquals($altitudeMode, $this->point->getAltitudeMode());
  }

  public function testCoordinatesField() {
    $coordinates = new Coordinates();

    $this->point->setCoordinates($coordinates);

    $this->assertEquals($coordinates, $this->point->getCoordinates());
  }

}
