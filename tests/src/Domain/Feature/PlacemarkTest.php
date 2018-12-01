<?php

namespace LibKml\Tests\Domain\Feature;

use LibKml\Domain\Feature\Placemark;
use LibKml\Domain\Geometry\Polygon;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class PlacemarkTest extends TestCase {

  /**
   * @var Placemark
   */
  protected $placemark;

  public function setUp() {
    $this->placemark = new Placemark();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitPlacemark')
      ->with($this->equalTo($this->placemark));

    $this->placemark->accept($objectVisitor);
  }

  public function testGeometryField() {
    $geometry = new Polygon();

    $this->placemark->setGeometry($geometry);

    $this->assertEquals($geometry, $this->placemark->getGeometry());
  }

}
