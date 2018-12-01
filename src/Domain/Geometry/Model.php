<?php

namespace LibKml\Domain\Geometry;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\Link;
use LibKml\Domain\Location;
use LibKml\Domain\Orientation;
use LibKml\Domain\Scale;

/**
 * A 3D object described in a COLLADA file.
 */
class Model extends Geometry {

  private $altitudeMode;
  private $location;
  private $orientation;
  private $scale;
  private $link;
  private $resourceMap = [];

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

  public function getOrientation(): Orientation {
    return $this->orientation;
  }

  public function setOrientation(Orientation $orientation): void {
    $this->orientation = $orientation;
  }

  public function getScale(): Scale {
    return $this->scale;
  }

  public function setScale(Scale $scale): void {
    $this->scale = $scale;
  }

  public function getLink(): Link {
    return $this->link;
  }

  public function setLink(Link $link): void {
    $this->link = $link;
  }

  public function getResourceMap(): array {
    return $this->resourceMap;
  }

  public function setResourceMap(array $resourceMap): void {
    $this->resourceMap = $resourceMap;
  }

}
