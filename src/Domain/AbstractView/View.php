<?php

declare(strict_types=1);

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\FieldType\AltitudeMode;

trait View
{
    protected float $longitude = 0.0;
    protected float $latitude = 0.0;
    protected float $altitude = 0.0;
    protected float $heading = 0.0;
    protected float $tilt = 0.0;
    protected string $altitudeMode = AltitudeMode::CLAMP_TO_GROUND;

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getAltitude(): float
    {
        return $this->altitude;
    }

    public function setAltitude(float $altitude): void
    {
        $this->altitude = $altitude;
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

    public function getAltitudeMode(): ?string
    {
        return $this->altitudeMode;
    }

    public function setAltitudeMode(string $altitudeMode): void
    {
        $this->altitudeMode = $altitudeMode;
    }
}
