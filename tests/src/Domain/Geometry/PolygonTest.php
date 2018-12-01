<?php

namespace LibKml\Tests\Domain\Geometry;

use LibKml\Domain\Geometry\LinearRing;
use LibKml\Domain\Geometry\Polygon;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class PolygonTest extends TestCase {

  /**
   * @var Polygon
   */
  protected $polygon;

  public function setUp() {
    $this->polygon = new Polygon();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitPolygon')
      ->with($this->equalTo($this->polygon));

    $this->polygon->accept($objectVisitor);
  }

  public function testExtrudeField() {
    $extrude = true;

    $this->polygon->setExtrude($extrude);

    $this->assertEquals($extrude, $this->polygon->getExtrude());
  }

  public function testTessellateField() {
    $tessellate = true;

    $this->polygon->setTessellate($tessellate);

    $this->assertEquals($tessellate, $this->polygon->getTessellate());
  }

  public function testAltitudeModeField() {
    $altitudeMode = "relativeToGround";

    $this->polygon->setAltitudeMode($altitudeMode);

    $this->assertEquals($altitudeMode, $this->polygon->getAltitudeMode());
  }

  public function testOuterBoundaryIsField() {
    $outerBoundaryIs = new LinearRing();

    $this->polygon->setOuterBoundaryIs($outerBoundaryIs);

    $this->assertEquals($outerBoundaryIs, $this->polygon->getOuterBoundaryIs());
  }

  public function testInnerBoundaryIsField() {
    $innerBoundaryIs = new LinearRing();

    $this->polygon->setInnerBoundaryIs($innerBoundaryIs);

    $this->assertEquals($innerBoundaryIs, $this->polygon->getInnerBoundaryIs());
  }

}
