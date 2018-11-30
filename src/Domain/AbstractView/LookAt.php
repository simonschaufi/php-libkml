<?php

namespace LibKML\Domain\AbstractView;

/**
 * LookAt class.
 */
class LookAt extends AbstractView {

  private $longitude;
  private $latitude;
  private $altitude;
  private $heading;
  private $tilt;
  private $range;
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
  public function getRange() {
    return $this->range;
  }

  /**
   *
   */
  public function setRange($range) {
    $this->range = $range;
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
