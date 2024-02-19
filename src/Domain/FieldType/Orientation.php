<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType;

/**
 * Describes rotation of a 3D model's coordinate system
 */
class Orientation
{
    private float $heading = 0.0;
    private float $tilt = 0.0;
    private float $roll = 0.0;

    public static function fromHeadingTiltRoll(float $heading, float $tilt, float $roll): Orientation
    {
        $orientation = new self();
        $orientation->heading = $heading;
        $orientation->tilt = $tilt;
        $orientation->roll = $roll;
        return $orientation;
    }

    public function getHeading(): float
    {
        return $this->heading;
    }

    public function setHeading(float $heading): void
    {
        $this->heading = $heading;
    }

    public function getTilt(): float
    {
        return $this->tilt;
    }

    public function setTilt(float $tilt): void
    {
        $this->tilt = $tilt;
    }

    public function getRoll(): float
    {
        return $this->roll;
    }

    public function setRoll(float $roll): void
    {
        $this->roll = $roll;
    }
}
