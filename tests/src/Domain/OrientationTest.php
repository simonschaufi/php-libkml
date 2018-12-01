<?php

namespace LibKml\Tests\Domain;

use LibKml\Domain\Orientation;
use PHPUnit\Framework\TestCase;

class OrientationTest extends TestCase {

  /**
   * @var Orientation
   */
  protected $orientation;

  public function setUp() {
    $this->orientation = new Orientation();
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
