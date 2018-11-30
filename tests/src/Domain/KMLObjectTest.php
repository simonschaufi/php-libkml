<?php

namespace LibKml\Tests\Domain;

use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;
use LibKml\Domain\KmlObject;

class KMLObjectTest extends TestCase {

  protected $kmlObject;

  public function setUp() {
    $this->kmlObject = new class extends KmlObject {
      public function accept(KmlObjectVisitorInterface $visitor): void {}
    };
  }

  public function testIdField() {
    $this->kmlObject->setId("ad993");

    $this->assertEquals("ad993", $this->kmlObject->getId());
  }

  public function testTargetIdField() {
    $this->kmlObject->setTargetId("ad993");

    $this->assertEquals("ad993", $this->kmlObject->getTargetId());
  }
}
