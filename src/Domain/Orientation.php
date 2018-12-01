<?php

namespace LibKml\Domain;

/**
 * Describes rotation of a 3D model's coordinate system.
 */
class Orientation {

  private $heading;
  private $tilt;
  private $roll;

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
