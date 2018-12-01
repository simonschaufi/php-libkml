<?php

namespace LibKml\Tests\Domain\Geometry;

use LibKml\Domain\Geometry\LineString;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class LineStringTest extends TestCase {

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

}
