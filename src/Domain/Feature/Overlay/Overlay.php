<?php

namespace LibKml\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Feature;
use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\Icon;

/**
 * Overlay abstract class.
 */
abstract class Overlay extends Feature {

  protected $color;
  protected $drawOrder;
  protected $icon;

  public function getColor(): Color {
    return $this->color;
  }

  public function setColor(Color $color) {
    $this->color = $color;
  }

  public function getDrawOrder(): int {
    return $this->drawOrder;
  }

  public function setDrawOrder(int $drawOrder) {
    $this->drawOrder = $drawOrder;
  }

  public function getIcon(): Icon {
    return $this->icon;
  }

  public function setIcon(Icon $icon) {
    $this->icon = $icon;
  }

}
