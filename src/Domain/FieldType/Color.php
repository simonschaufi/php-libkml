<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType;

class Color
{
    private int $red = 0;
    private int $green = 0;
    private int $blue = 0;
    private float $alpha = 1.0;

    public static function fromRGBA(int $red, int $green, int $blue, float $alpha): Color
    {
        $color = new self();

        $color->red = $red;
        $color->green = $green;
        $color->blue = $blue;
        $color->alpha = $alpha;

        return $color;
    }

    public static function fromWhite(): Color
    {
        $color = new self();

        $color->red = 0xFF;
        $color->green = 0xFF;
        $color->blue = 0xFF;
        $color->alpha = 1;

        return $color;
    }

    public static function fromBlack(): Color
    {
        $color = new self();

        $color->red = 0x00;
        $color->green = 0x00;
        $color->blue = 0x00;
        $color->alpha = 1;

        return $color;
    }

    public function getRed(): int
    {
        return $this->red;
    }

    public function setRed(int $red): void
    {
        $this->red = $red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function setGreen(int $green): void
    {
        $this->green = $green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    public function setBlue(int $blue): void
    {
        $this->blue = $blue;
    }

    public function getAlpha(): float
    {
        return $this->alpha;
    }

    public function setAlpha(float $alpha): void
    {
        $this->alpha = $alpha;
    }
}
