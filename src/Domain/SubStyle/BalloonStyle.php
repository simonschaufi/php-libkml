<?php

namespace LibKml\Domain\SubStyle;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * BalloonStyle class.
 */
class BalloonStyle extends SubStyle {

  private $bgColor;
  private $textColor;
  private $text;
  private $displayMode;

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitBalloonStyle($this);
  }

  public function getBgColor() {
    return $this->bgColor;
  }

  public function setBgColor($bgColor) {
    $this->bgColor = $bgColor;
  }

  public function getTextColor() {
    return $this->textColor;
  }

  public function setTextColor($textColor) {
    $this->textColor = $textColor;
  }

  public function getText() {
    return $this->text;
  }

  public function setText($text) {
    $this->text = $text;
  }

  public function getDisplayMode() {
    return $this->displayMode;
  }

  public function setDisplayMode($displayMode) {
    $this->displayMode = $displayMode;
  }

}
