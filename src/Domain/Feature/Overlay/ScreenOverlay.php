<?php

namespace LibKml\Domain\Feature\Overlay;

use LibKml\Domain\FieldType\Vec2;
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

  public function getOverlayXY(): Vec2 {
    return $this->overlayXY;
  }

  public function setOverlayXY(Vec2 $overlayXY): void {
    $this->overlayXY = $overlayXY;
  }

  public function getScreenXY(): Vec2 {
    return $this->screenXY;
  }

  public function setScreenXY(Vec2 $screenXY): void {
    $this->screenXY = $screenXY;
  }

  public function getRotationXY(): Vec2 {
    return $this->rotationXY;
  }

  public function setRotationXY(Vec2 $rotationXY): void {
    $this->rotationXY = $rotationXY;
  }

  public function getSize(): Vec2 {
    return $this->size;
  }

  public function setSize(Vec2 $size): void {
    $this->size = $size;
  }

}
