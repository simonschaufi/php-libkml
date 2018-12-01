<?php

namespace LibKml\Domain\Geometry;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\Location;

/**
 * A 3D object described in a COLLADA file.
 */
class Model extends Geometry {

  private $altitudeMode;
  private $location;
  private $orientation;
  private $scale;
  private $link;
  private $resourceMap;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitModel($this);
  }

  public function getAltitudeMode(): string {
    return $this->altitudeMode;
  }

  public function setAltitudeMode(string $altitudeMode): void {
    $this->altitudeMode = $altitudeMode;
  }

  public function getLocation(): Location {
    return $this->location;
  }

  public function setLocation(Location $location): void {
    $this->location = $location;
  }

  public function getOrientation() {
    return $this->orientation;
  }

  public function setOrientation($orientation) {
    $this->orientation = $orientation;
  }

  public function getScale() {
    return $this->scale;
  }

  public function setScale($scale) {
    $this->scale = $scale;
  }

  public function getLink() {
    return $this->link;
  }

  public function setLink($link) {
    $this->link = $link;
  }

  public function getResourceMap() {
    return $this->resourceMap;
  }

  public function setResourceMap($resourceMap) {
    $this->resourceMap = $resourceMap;
  }

}
