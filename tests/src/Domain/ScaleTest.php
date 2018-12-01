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
