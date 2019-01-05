<?php

namespace LibKml\Domain\SubStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\DisplayModeEnum;
use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * Specifies how the description balloon for placemarks is drawn.
 */
class BalloonStyle extends SubStyle {

  private $bgColor;
  private $textColor;
  private $text;
  private $displayMode;

  public function __construct() {
    $this->bgColor = Color::fromWhite();
    $this->textColor = Color::fromBlack();
    $this->displayMode = DisplayModeEnum::DEFAULT;
    $this->text = '';
  }

  public function accept(KmlObjectVisitorInterface $visitor): void {
    $visitor->visitBalloonStyle($this);
  }

  public function getBgColor(): ?Color {
    return $this->bgColor;
  }

  public function setBgColor(?Color $bgColor): void {
    $this->bgColor = $bgColor;
  }

  public function getTextColor(): ?Color {
    return $this->textColor;
  }

  public function setTextColor(?Color $textColor): void {
    $this->textColor = $textColor;
  }

  public function getText(): ?string {
    return $this->text;
  }

  public function setText(?string $text): void {
    $this->text = $text;
  }

  public function getDisplayMode(): ?string {
    return $this->displayMode;
  }

  public function setDisplayMode(?string $displayMode): void {
    $this->displayMode = $displayMode;
  }

}
