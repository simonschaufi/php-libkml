<?php

declare(strict_types=1);

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\SubStyle\SubStyle;

abstract class ColorStyle extends SubStyle
{
    protected Color $color;
    protected string $colorMode = 'normal';

    public function __construct()
    {
        $this->color = Color::fromWhite();
    }

    public function getColor(): Color
    {
        return $this->color;
    }

    public function setColor(Color $color): void
    {
        $this->color = $color;
    }

    public function getColorMode(): string
    {
        return $this->colorMode;
    }

    public function setColorMode(string $colorMode): void
    {
        $this->colorMode = $colorMode;
    }
}
