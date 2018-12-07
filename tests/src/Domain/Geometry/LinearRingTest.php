<?php

namespace LibKml\Tests\Domain\Geometry;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\Geometry\LinearRing;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class LinearRingTest extends TestCase {

  /**
   * @var LinearRing
   */
  protected $linearRing;

  public function setUp() {
    $this->linearRing = new LinearRing();
  }

  public function testDefaultValues() {
    $this->assertFalse($this->linearRing->getExtrude());
    $this->assertFalse($this->linearRing->getTessellate());
    $this->assertEquals(AltitudeMode::RELATIVE_TO_GROUND, $this->linearRing->getAltitudeMode());
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitLinearRing')
      ->with($this->equalTo($this->linearRing));

    $this->linearRing->accept($objectVisitor);
  }

  public function testExtrudeField() {
    $extrude = true;

    $this->linearRing->setExtrude($extrude);

    $this->assertEquals($extrude, $this->linearRing->getExtrude());
  }

  public function testTessellateField() {
    $tessellate = true;

    $this->linearRing->setTessellate($tessellate);

    $this->assertEquals($tessellate, $this->linearRing->getTessellate());
  }

  public function testAltitudeModeField() {
    $altitudeMode = "relativeToGround";

    $this->linearRing->setAltitudeMode($altitudeMode);

    $this->assertEquals($altitudeMode, $this->linearRing->getAltitudeMode());
  }

  public function testCoordinatesField() {
    $coordinates1 = new Coordinates();
    $coordinates2 = new Coordinates();

    $coordinates = [$coordinates1, $coordinates2];

    $this->linearRing->setCoordinates($coordinates);

    $this->assertCount(2, $this->linearRing->getCoordinates());
    $this->assertContains($coordinates1, $this->linearRing->getCoordinates());
    $this->assertContains($coordinates2, $this->linearRing->getCoordinates());
  }

  public function testAddCoordinate() {
    $coordinates = new Coordinates();

    $this->linearRing->addCoordinates($coordinates);

    $this->assertCount(1, $this->linearRing->getCoordinates());
    $this->assertContains($coordinates, $this->linearRing->getCoordinates());
  }

  public function testClearCoordinates() {
    $coordinates1 = new Coordinates();
    $coordinates2 = new Coordinates();
    $this->linearRing->setCoordinates([$coordinates1, $coordinates2]);

    $this->linearRing->clearCoordinates();

    $this->assertEmpty($this->linearRing->getCoordinates());
  }
}
