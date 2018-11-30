<?php

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\KmlObject;

/**
 * AbstractView abstract class.
 */
abstract class AbstractView extends KmlObject {

  /**
   * @var float
   */
  private $longitude;

  /**
   * @var float
   */
  private $latitude;

  /**
   * @var float
   */
  private $altitude;

  /**
   * @var float
   */
  private $heading = 0;

  /**
   * @var float
   */
  private $tilt;

  /**
   * @var float
   */
  private $roll;

  /**
   * @var int
   */
  private $altitudeMode;

  public function getLongitude() {
    return $this->longitude;
  }

  public function setLongitude($longitude) {
    $this->longitude = $longitude;
  }

  public function getLatitude() {
    return $this->latitude;
  }

  public function setLatitude($latitude) {
    $this->latitude = $latitude;
  }

  public function getAltitude() {
    return $this->altitude;
  }

  public function setAltitude($altitude) {
    $this->altitude = $altitude;
  }

  public function getHeading() {
    return $this->heading;
  }

  public function setHeading($heading) {
    $this->heading = $heading;
  }

  public function getTilt() {
    return $this->tilt;
  }

  public function setTilt($tilt) {
    $this->tilt = $tilt;
  }

  public function getRoll() {
    return $this->roll;
  }

  public function setRoll($roll) {
    $this->roll = $roll;
  }

  public function getAltitudeMode() {
    return $this->altitudeMode;
  }

  public function setAltitudeMode($altitudeMode) {
    $this->altitudeMode = $altitudeMode;
  }

}
