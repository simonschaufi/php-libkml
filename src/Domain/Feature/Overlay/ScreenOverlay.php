<?php

namespace LibKml\Domain\Feature\Overlay;

use LibKml\Domain\KmlObjectVisitor;

/**
 * ScreenOverlay class.
 */
class ScreenOverlay extends Overlay {

  private $rotation;
  private $overlayXY;
  private $screenXY;
  private $rotationXY;
  private $size;

  /**
   * @param \LibKml\Domain\KmlObjectVisitor $visitor
   */
  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitScreenOverlay($this);
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

  /**
   *
   */
  public function getOverlayXY() {
    return $this->overlayXY;
  }

  /**
   *
   */
  public function setOverlayXY($overlayXY) {
    $this->overlayXY = $overlayXY;
  }

  /**
   *
   */
  public function getScreenXY() {
    return $this->screenXY;
  }

  /**
   *
   */
  public function setScreenXY($screenXY) {
    $this->screenXY = $screenXY;
  }

  /**
   *
   */
  public function getRotationXY() {
    return $this->rotationXY;
  }

  /**
   *
   */
  public function setRotationXY($rotationXY) {
    $this->rotationXY = $rotationXY;
  }

  /**
   *
   */
  public function getSize() {
    return $this->size;
  }

  /**
   *
   */
  public function setSize($size) {
    $this->size = $size;
  }

}
