<?php

namespace LibKML\Domain\AbstractView;

/**
 * Defines the virtual camera that views the scene.
 */
class Camera extends AbstractView {

  private $longitude;
  private $latitude;
  private $altitude;
  private $heading = 0;
  private $tilt;
  private $roll;
  private $altitudeMode;

  /**
   *
   */
  public function getLongitude() {
    return $this->longitude;
  }

  /**
   *
   */
  public function setLongitude($longitude) {
    $this->longitude = $longitude;
  }

  /**
   *
   */
  public function getLatitude() {
    return $this->latitude;
  }

  /**
   *
   */
  public function setLatitude($latitude) {
    $this->latitude = $latitude;
  }

  /**
   *
   */
  public function getAltitude() {
    return $this->altitude;
  }

  /**
   *
   */
  public function setAltitude($altitude) {
    $this->altitude = $altitude;
  }

  /**
   *
   */
  public function getHeading() {
    return $this->heading;
  }

  /**
   *
   */
  public function setHeading($heading) {
    $this->heading = $heading;
  }

  /**
   *
   */
  public function getTilt() {
    return $this->tilt;
  }

  /**
   *
   */
  public function setTilt($tilt) {
    $this->tilt = $tilt;
  }

  /**
   *
   */
  public function getRoll() {
    return $this->roll;
  }

  /**
   *
   */
  public function setRoll($roll) {
    $this->roll = $roll;
  }

  /**
   *
   */
  public function getAltitudeMode() {
    return $this->altitudeMode;
  }

  /**
   *
   */
  public function setAltitudeMode($altitudeMode) {
    $this->altitudeMode = $altitudeMode;
  }

}
