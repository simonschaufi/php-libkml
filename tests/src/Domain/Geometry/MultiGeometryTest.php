<?php

namespace LibKml\Tests\Domain\Geometry;

use LibKml\Domain\Geometry\MultiGeometry;
use LibKml\Domain\Geometry\Point;
use LibKml\Domain\Geometry\Polygon;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class MultiGeometryTest extends TestCase {

  /**
   * @var MultiGeometry
   */
  private $multiGeometry;

  private $point;
  private $polygon;
  private $geometries;

  public function setUp() {
    $this->multiGeometry = new MultiGeometry();

    $this->point = new Point();
    $this->polygon = new Polygon();
    $this->geometries = [$this->point, $this->polygon];
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitMultiGeometry')
      ->with($this->equalTo($this->multiGeometry));

    $this->multiGeometry->accept($objectVisitor);
  }

  public function testGeometriesField() {
    $this->multiGeometry->setGeometries($this->geometries);

    $this->assertCount(2, $this->multiGeometry->getGeometries());
    $this->assertContains($this->point, $this->multiGeometry->getGeometries());
    $this->assertContains($this->polygon, $this->multiGeometry->getGeometries());
  }

  public function testAddGeometry() {
    $this->multiGeometry->addGeometry($this->point);

    $this->assertCount(1, $this->multiGeometry->getGeometries());
    $this->assertContains($this->point, $this->multiGeometry->getGeometries());
  }

  public function testClearGeometries() {
    $this->multiGeometry->setGeometries($this->geometries);

    $this->multiGeometry->clearGeometries();

    $this->assertCount(0, $this->multiGeometry->getGeometries());
  }

}
