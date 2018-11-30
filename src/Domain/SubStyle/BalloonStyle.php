<?php

namespace LibKML\Domain\SubStyle;

/**
 * BalloonStyle class.
 */
class BalloonStyle extends SubStyle {

  private $bgColor;
  private $textColor;
  private $text;
  private $displayMode;

  /**
   *
   */
  public function getBgColor() {
    return $this->bgColor;
  }

  /**
   *
   */
  public function setBgColor($bgColor) {
    $this->bgColor = $bgColor;
  }

  /**
   *
   */
  public function getTextColor() {
    return $this->textColor;
  }

  /**
   *
   */
  public function setTextColor($textColor) {
    $this->textColor = $textColor;
  }

  /**
   *
   */
  public function getText() {
    return $this->text;
  }

  /**
   *
   */
  public function setText($text) {
    $this->text = $text;
  }

  /**
   *
   */
  public function getDisplayMode() {
    return $this->displayMode;
  }

  /**
   *
   */
  public function setDisplayMode($displayMode) {
    $this->displayMode = $displayMode;
  }

}
