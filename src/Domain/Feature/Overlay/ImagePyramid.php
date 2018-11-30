<?php

namespace LibKml\Domain\Feature\Overlay;

/**
 * Hierarchical set of images.
 */
class ImagePyramid {

  private $tileSize;
  private $maxWidth;
  private $maxHeight;
  private $gridOrigin;

  public function getTileSize(): int {
    return $this->tileSize;
  }

  public function setTileSize(int $tileSize): void {
    $this->tileSize = $tileSize;
  }

  public function getMaxWidth(): int {
    return $this->maxWidth;
  }

  public function setMaxWidth(int $maxWidth): void {
    $this->maxWidth = $maxWidth;
  }

  public function getMaxHeight(): int {
    return $this->maxHeight;
  }

  public function setMaxHeight(int $maxHeight): void {
    $this->maxHeight = $maxHeight;
  }

  public function getGridOrigin(): string {
    return $this->gridOrigin;
  }

  public function setGridOrigin(string $gridOrigin): void {
    $this->gridOrigin = $gridOrigin;
  }

}
