<?php

namespace LibKml\Domain\StyleSelector;

/**
 * Pair class.
 */
class Pair {

  private $key;
  private $styleUrl;
  private $style;

  public function getKey(): string {
    return $this->key;
  }

  public function setKey(string $key): void {
    $this->key = $key;
  }

  public function getStyleUrl(): string {
    return $this->styleUrl;
  }

  public function setStyleUrl(string $styleUrl): void {
    $this->styleUrl = $styleUrl;
  }

  public function getStyle(): Style {
    return $this->style;
  }

  public function setStyle(Style $style): void {
    $this->style = $style;
  }

}
