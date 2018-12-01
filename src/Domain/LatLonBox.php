<?php

namespace LibKml\Domain;

/**
 * LatLonBox class.
 */
class LatLonBox {

  private $north;
  private $south;
  private $east;
  private $west;
  private $rotation;

  public function getNorth(): float {
    return $this->north;
  }

  public function setNorth(float $north): void {
    $this->north = $north;
  }

  public function getSouth(): float {
    return $this->south;
  }

  public function setSouth(float $south): void {
    $this->south = $south;
  }

  public function getEast(): float {
    return $this->east;
  }

  public function setEast(float $east): void {
    $this->east = $east;
  }

  public function getWest(): float {
    return $this->west;
  }

  public function setWest(float $west): void {
    $this->west = $west;
  }

  public function getRotation(): float {
    return $this->rotation;
  }

  public function setRotation(float $rotation): void {
    $this->rotation = $rotation;
  }

}
