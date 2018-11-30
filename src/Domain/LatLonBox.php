<?php

namespace LibKML\Domain;

/**
 * LatLonBox class.
 */
class LatLonBox extends KMLObject {

  private $north;
  private $south;
  private $east;
  private $west;
  private $rotation;

  /**
   *
   */
  public function getNorth() {
    return $this->north;
  }

  /**
   *
   */
  public function setNorth($north) {
    $this->north = $north;
  }

  /**
   *
   */
  public function getSouth() {
    return $this->south;
  }

  /**
   *
   */
  public function setSouth($south) {
    $this->south = $south;
  }

  /**
   *
   */
  public function getEast() {
    return $this->east;
  }

  /**
   *
   */
  public function setEast($east) {
    $this->east = $east;
  }

  /**
   *
   */
  public function getWest() {
    return $this->west;
  }

  /**
   *
   */
  public function setWest($west) {
    $this->west = $west;
  }

  /**
   *
   */
  public function getRotation() {
    return $this->rotation;
  }

  /**
   *
   */
  public function setRotation($rotation) {
    $this->rotation = $rotation;
  }

}
