<?php

namespace LibKml\Domain\StyleSelector;

use LibKml\Domain\KmlObjectVisitor;

/**
 * Style class.
 */
class Style extends StyleSelector {

  private $iconStyle;
  private $labelStyle;
  private $lineStyle;
  private $polyStyle;
  private $balloonStyle;
  private $listStyle;

  public function accept(KmlObjectVisitor $visitor) {
    $visitor->visitStyle($this);
  }

  public function getIconStyle() {
    return $this->iconStyle;
  }

  public function setIconStyle($iconStyle) {
    $this->iconStyle = $iconStyle;
  }

  public function getLabelStyle() {
    return $this->labelStyle;
  }

  public function setLabelStyle($labelStyle) {
    $this->labelStyle = $labelStyle;
  }

  public function getLineStyle() {
    return $this->lineStyle;
  }

  public function setLineStyle($lineStyle) {
    $this->lineStyle = $lineStyle;
  }

  public function getPolyStyle() {
    return $this->polyStyle;
  }

  public function setPolyStyle($polyStyle) {
    $this->polyStyle = $polyStyle;
  }

  public function getBalloonStyle() {
    return $this->balloonStyle;
  }

  public function setBalloonStyle($balloonStyle) {
    $this->balloonStyle = $balloonStyle;
  }

  public function getListStyle() {
    return $this->listStyle;
  }

  public function setListStyle($listStyle) {
    $this->listStyle = $listStyle;
  }

}
