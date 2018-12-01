<?php

namespace LibKml\Tests\Domain\Geometry;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\Geometry\LineString;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class LineStringTest extends TestCase {

  /**
   * @var LineString
   */
  protected $lineString;

  public function setUp() {
    $this->lineString = new LineString();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitLineString')
      ->with($this->equalTo($this->lineString));

    $this->lineString->accept($objectVisitor);
  }

  public function testExtrudeField() {
    $extrude = true;

    $this->lineString->setExtrude($extrude);

    $this->assertEquals($extrude, $this->lineString->getExtrude());
  }

  public function testTessellateField() {
    $tessellate = true;

    $this->lineString->setTessellate($tessellate);

    $this->assertEquals($tessellate, $this->lineString->getTessellate());
  }

  public function testAltitudeModeField() {
    $altitudeMode = "relativeToGround";

    $this->lineString->setAltitudeMode($altitudeMode);

    $this->assertEquals($altitudeMode, $this->lineString->getAltitudeMode());
  }

  public function testCoordinatesField() {
    $coordinates1 = new Coordinates();
    $coordinates2 = new Coordinates();

    $coordinates = [$coordinates1, $coordinates2];

    $this->lineString->setCoordinates($coordinates);

    $this->assertCount(2, $this->lineString->getCoordinates());
    $this->assertContains($coordinates1, $this->lineString->getCoordinates());
    $this->assertContains($coordinates2, $this->lineString->getCoordinates());
  }

}
