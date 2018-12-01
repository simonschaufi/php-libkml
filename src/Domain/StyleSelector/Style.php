<?php

namespace LibKml\Domain\StyleSelector;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\BalloonStyle;
use LibKml\Domain\SubStyle\ColorStyle\IconStyle;
use LibKml\Domain\SubStyle\ColorStyle\LabelStyle;
use LibKml\Domain\SubStyle\ColorStyle\LineStyle;
use LibKml\Domain\SubStyle\ColorStyle\PolyStyle;
use LibKml\Domain\SubStyle\ListStyle;

/**
 * A Style defines an addressable style group.
 */
class Style extends StyleSelector {

  private $iconStyle;
  private $labelStyle;
  private $lineStyle;
  private $polyStyle;
  private $balloonStyle;
  private $listStyle;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitStyle($this);
  }

  public function getIconStyle(): IconStyle {
    return $this->iconStyle;
  }

  public function setIconStyle(IconStyle $iconStyle): void {
    $this->iconStyle = $iconStyle;
  }

  public function getLabelStyle(): LabelStyle {
    return $this->labelStyle;
  }

  public function setLabelStyle(LabelStyle $labelStyle): void {
    $this->labelStyle = $labelStyle;
  }

  public function getLineStyle(): LineStyle {
    return $this->lineStyle;
  }

  public function setLineStyle(LineStyle $lineStyle): void {
    $this->lineStyle = $lineStyle;
  }

  public function getPolyStyle(): PolyStyle {
    return $this->polyStyle;
  }

  public function setPolyStyle(PolyStyle $polyStyle): void {
    $this->polyStyle = $polyStyle;
  }

  public function getBalloonStyle(): BalloonStyle {
    return $this->balloonStyle;
  }

  public function setBalloonStyle(BalloonStyle $balloonStyle): void {
    $this->balloonStyle = $balloonStyle;
  }

  public function getListStyle(): ListStyle {
    return $this->listStyle;
  }

  public function setListStyle(ListStyle $listStyle): void {
    $this->listStyle = $listStyle;
  }

}
