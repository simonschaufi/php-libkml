<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType;

class Vec2
{
    private float $x;
    private float $y;
    private string $xUnits;
    private string $yUnits;

    public static function fromValues(float $x, float $y, string $xUnits, string $yUnits): Vec2
    {
        $vec2 = new self();
        $vec2->x = $x;
        $vec2->y = $y;
        $vec2->xUnits = $xUnits;
        $vec2->yUnits = $yUnits;
        return $vec2;
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function setX(float $x): void
    {
        $this->x = $x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function setY(float $y): void
    {
        $this->y = $y;
    }

    public function getXUnits(): string
    {
        return $this->xUnits;
    }

    public function setXUnits(string $xUnits): void
    {
        $this->xUnits = $xUnits;
    }

    public function getYUnits(): string
    {
        return $this->yUnits;
    }

    public function setYUnits(string $yUnits): void
    {
        $this->yUnits = $yUnits;
    }
}
