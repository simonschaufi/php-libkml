<?php

declare(strict_types=1);

namespace LibKml\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Feature;
use LibKml\Domain\FieldType\Color;
use LibKml\Domain\Icon;

/**
 * @see https://developers.google.com/kml/documentation/kmlreference#overlay
 */
abstract class Overlay extends Feature
{
    protected Color $color;

    /**
     * This element defines the stacking order for the images in overlapping overlays.
     */
    protected int $drawOrder = 0;

    /**
     * Defines the image associated with the Overlay.
     */
    protected ?Icon $icon = null;

    public function __construct()
    {
        $this->color = Color::fromRGBA(0xFF, 0xFF, 0xFF, 1);
    }

    public function getColor(): Color
    {
        return $this->color;
    }

    public function setColor(Color $color): void
    {
        $this->color = $color;
    }

    public function getDrawOrder(): int
    {
        return $this->drawOrder;
    }

    public function setDrawOrder(int $drawOrder): void
    {
        $this->drawOrder = $drawOrder;
    }

    public function getIcon(): ?Icon
    {
        return $this->icon;
    }

    public function setIcon(?Icon $icon): void
    {
        $this->icon = $icon;
    }
}
