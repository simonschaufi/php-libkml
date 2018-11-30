<?php

namespace LibKml\Tests\Domain;

use PHPUnit\Framework\TestCase;
use LibKML\Domain\KMLObject;

class KMLObjectTest extends TestCase {

  protected $kmlObject;

  public function setUp() {
    $this->kmlObject = new class extends KMLObject {};
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
