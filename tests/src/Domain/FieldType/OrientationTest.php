<?php

namespace LibKml\Tests\Domain\FieldType;

use LibKml\Domain\FieldType\Orientation;
use PHPUnit\Framework\TestCase;

class OrientationTest extends TestCase {

  /**
   * @var Orientation
   */
  protected $orientation;

  public function setUp() {
    $this->orientation = new Orientation();
  }

  public function testDefaultValues() {
    $this->assertEquals(0, $this->orientation->getHeading());
    $this->assertEquals(0, $this->orientation->getTilt());
    $this->assertEquals(0, $this->orientation->getRoll());
  }

  public function testFromHeadingTiltRoll() {
    $heading = 34.5;
    $tilt = 40.67;
    $roll = 15.3;

    $orientation = Orientation::fromHeadingTiltRoll($heading, $tilt, $roll);

    $this->assertEquals($heading, $orientation->getHeading());
    $this->assertEquals($tilt, $orientation->getTilt());
    $this->assertEquals($roll, $orientation->getRoll());
  }

  public function testHeadingField() {
    $heading = 16.04;

    $this->orientation->setHeading($heading);

    $this->assertEquals($heading, $this->orientation->getHeading());
  }

  public function testTiltField() {
    $tilt = 16.04;

    $this->orientation->setTilt($tilt);

    $this->assertEquals($tilt, $this->orientation->getTilt());
  }

  public function testRollField() {
    $roll = 16.04;

    $this->orientation->setRoll($roll);

    $this->assertEquals($roll, $this->orientation->getRoll());
  }

}
