<?php

declare(strict_types=1);

namespace LibKml\Domain;

/**
 * Describe an scale of an element along the x, y, and z axes.
 */
class Scale
{
    private float $x = 0.0;
    private float $y = 0.0;
    private float $z = 0.0;

    public static function fromCoordinates(float $x, float $y, float $z): Scale
    {
        $scale = new self();
        $scale->x = $x;
        $scale->y = $y;
        $scale->z = $z;
        return $scale;
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

    public function getZ(): float
    {
        return $this->z;
    }

    public function setZ(float $z): void
    {
        $this->z = $z;
    }
}
