<?php

namespace LibKml\Domain;

/**
 * LatLonAltBox class.
 */
class LatLonAltBox {

  private $altitudeMode;
  private $minAltitude;
  private $maxAltitude;
  private $north;
  private $south;
  private $east;
  private $west;

  public function getAltitudeMode() {
    return $this->altitudeMode;
  }

  public function setAltitudeMode($altitudeMode) {
    $this->altitudeMode = $altitudeMode;
  }

  public function getMinAltitude() {
    return $this->minAltitude;
  }

  public function setMinAltitude($minAltitude) {
    $this->minAltitude = $minAltitude;
  }

  public function getMaxAltitude() {
    return $this->maxAltitude;
  }

  public function setMaxAltitude($maxAltitude) {
    $this->maxAltitude = $maxAltitude;
  }

  public function getNorth() {
    return $this->north;
  }

  public function setNorth($north) {
    $this->north = $north;
  }

  public function getSouth() {
    return $this->south;
  }

  public function setSouth($south) {
    $this->south = $south;
  }

  public function getEast() {
    return $this->east;
  }

  public function setEast($east) {
    $this->east = $east;
  }

  public function getWest() {
    return $this->west;
  }

  public function setWest($west) {
    $this->west = $west;
  }

}
