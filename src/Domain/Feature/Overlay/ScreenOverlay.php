<?php

namespace LibKml\Domain\Feature\Overlay;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * This element draws an image overlay fixed to the screen.
 */
class ScreenOverlay extends Overlay {

  private $rotation;
  private $overlayXY;
  private $screenXY;
  private $rotationXY;
  private $size;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitScreenOverlay($this);
  }

  public function getRotation(): float {
    return $this->rotation;
  }

  public function setRotation(float $rotation): void {
    $this->rotation = $rotation;
  }

  public function getOverlayXY() {
    return $this->overlayXY;
  }

  public function setOverlayXY($overlayXY) {
    $this->overlayXY = $overlayXY;
  }

  public function getScreenXY() {
    return $this->screenXY;
  }

  public function setScreenXY($screenXY) {
    $this->screenXY = $screenXY;
  }

  public function getRotationXY() {
    return $this->rotationXY;
  }

  public function setRotationXY($rotationXY) {
    $this->rotationXY = $rotationXY;
  }

  public function getSize() {
    return $this->size;
  }

  public function setSize($size) {
    $this->size = $size;
  }

}
