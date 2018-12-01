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
    $coordinates1 = new Coordinates();
    $coordinates2 = new Coordinates();

    $coordinates = [$coordinates1, $coordinates2];

    $this->point->setCoordinates($coordinates);

    $this->assertCount(2, $this->point->getCoordinates());
    $this->assertContains($coordinates1, $this->point->getCoordinates());
    $this->assertContains($coordinates2, $this->point->getCoordinates());
  }

  public function testAddCoordinate() {
    $coordinates = new Coordinates();

    $this->point->addCoordinates($coordinates);

    $this->assertCount(1, $this->point->getCoordinates());
    $this->assertContains($coordinates, $this->point->getCoordinates());
  }

  public function testClearCoordinates() {
    $coordinates1 = new Coordinates();
    $coordinates2 = new Coordinates();
    $this->point->setCoordinates([$coordinates1, $coordinates2]);

    $this->point->clearCoordinates();

    $this->assertEmpty($this->point->getCoordinates());
  }
}
