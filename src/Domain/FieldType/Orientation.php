<?php

namespace LibKml\Domain\FieldType;

/**
 * Describes rotation of a 3D model's coordinate system.
 */
class Orientation {

  private $heading = 0;
  private $tilt = 0;
  private $roll = 0;

  public static function fromHeadingTiltRoll($heading, $tilt, $roll): Orientation {
    $orientation = new Orientation();
    $orientation->heading = $heading;
    $orientation->tilt = $tilt;
    $orientation->roll = $roll;
    return $orientation;
  }

  public function getHeading(): float {
    return $this->heading;
  }

  public function setHeading(float $heading) {
    $this->heading = $heading;
  }

  public function getTilt(): float {
    return $this->tilt;
  }

  public function setTilt(float $tilt) {
    $this->tilt = $tilt;
  }

  public function getRoll(): float {
    return $this->roll;
  }

  public function setRoll(float $roll) {
    $this->roll = $roll;
  }

}
