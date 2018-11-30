<?php

namespace LibKML\Domain\Feature\Overlay;

/**
 * PhotoOverlay class.
 */
class PhotoOverlay extends Overlay {

  private $rotation;
  private $viewVolume;
  private $imagePyramid;
  private $point;
  private $shape;

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
  public function getViewVolume() {
    return $this->viewVolume;
  }

  /**
   *
   */
  public function setViewVolume($viewVolume) {
    $this->viewVolume = $viewVolume;
  }

  /**
   *
   */
  public function getImagePyramid() {
    return $this->imagePyramid;
  }

  /**
   *
   */
  public function setImagePyramid($imagePyramid) {
    $this->imagePyramid = $imagePyramid;
  }

  /**
   *
   */
  public function getPoint() {
    return $this->point;
  }

  /**
   *
   */
  public function setPoint($point) {
    $this->point = $point;
  }

  /**
   *
   */
  public function getShape() {
    return $this->shape;
  }

  /**
   *
   */
  public function setShape($shape) {
    $this->shape = $shape;
  }

}
