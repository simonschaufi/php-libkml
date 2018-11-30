<?php

namespace LibKml\Domain\Geometry;

use LibKml\Domain\KmlObjectVisitor;

/**
 * Model class.
 */
class Model extends Geometry {

  private $altitudeMode;
  private $location;
  private $orientation;
  private $scale;
  private $link;
  private $resourceMap;

  /**
   * @param KmlObjectVisitor $visitor
   */
  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitModel($this);
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

  /**
   *
   */
  public function getLocation() {
    return $this->location;
  }

  /**
   *
   */
  public function setLocation($location) {
    $this->location = $location;
  }

  /**
   *
   */
  public function getOrientation() {
    return $this->orientation;
  }

  /**
   *
   */
  public function setOrientation($orientation) {
    $this->orientation = $orientation;
  }

  /**
   *
   */
  public function getScale() {
    return $this->scale;
  }

  /**
   *
   */
  public function setScale($scale) {
    $this->scale = $scale;
  }

  /**
   *
   */
  public function getLink() {
    return $this->link;
  }

  /**
   *
   */
  public function setLink($link) {
    $this->link = $link;
  }

  /**
   *
   */
  public function getResourceMap() {
    return $this->resourceMap;
  }

  /**
   *
   */
  public function setResourceMap($resourceMap) {
    $this->resourceMap = $resourceMap;
  }

}
