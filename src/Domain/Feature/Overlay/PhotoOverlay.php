<?php

namespace LibKml\Domain\Feature\Overlay;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * Allows to geographically locate a photograph on the Earth.
 */
class PhotoOverlay extends Overlay {

  private $rotation;
  private $viewVolume;
  private $imagePyramid;
  private $point;
  private $shape;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitPhotoOverlay($this);
  }

  public function getRotation(): float {
    return $this->rotation;
  }

  public function setRotation(float $rotation): void {
    $this->rotation = $rotation;
  }

  public function getViewVolume(): ViewVolume {
    return $this->viewVolume;
  }

  public function setViewVolume(ViewVolume $viewVolume): void {
    $this->viewVolume = $viewVolume;
  }

  public function getImagePyramid(): ImagePyramid {
    return $this->imagePyramid;
  }

  public function setImagePyramid(ImagePyramid $imagePyramid) {
    $this->imagePyramid = $imagePyramid;
  }

  public function getPoint() {
    return $this->point;
  }

  public function setPoint($point) {
    $this->point = $point;
  }

  public function getShape() {
    return $this->shape;
  }

  public function setShape($shape) {
    $this->shape = $shape;
  }

}
