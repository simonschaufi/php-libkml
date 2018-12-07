<?php

namespace LibKml\Tests\Domain;

use LibKml\Domain\Scale;
use PHPUnit\Framework\TestCase;

class ScaleTest extends TestCase {

  /**
   * @var Scale
   */
  protected $scale;

  public function setUp() {
    $this->scale = new Scale();
  }

  public function testDefaultValues() {
    $this->assertEquals(0, $this->scale->getX());
    $this->assertEquals(0, $this->scale->getY());
    $this->assertEquals(0, $this->scale->getZ());
  }

  public function testFromCoordinates() {
    $x = 45.23;
    $y = 13.12;
    $z = 1.678;

    $scale = Scale::fromCoordinates($x, $y, $z);

    $this->assertEquals($x, $scale->getX());
    $this->assertEquals($y, $scale->getY());
    $this->assertEquals($z, $scale->getZ());
  }

  public function testXField() {
    $x = 1.34;

    $this->scale->setX($x);

    $this->assertEquals($x, $this->scale->getX());
  }

  public function testYField() {
    $y = 1.34;

    $this->scale->setY($y);

    $this->assertEquals($y, $this->scale->getY());
  }

  public function testZField() {
    $z = 1.34;

    $this->scale->setZ($z);

    $this->assertEquals($z, $this->scale->getZ());
  }

}
