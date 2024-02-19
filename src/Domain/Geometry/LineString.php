<?php

declare(strict_types=1);

namespace LibKml\Domain\Geometry;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * LineString class.
 */
class LineString extends Geometry
{
    private ?bool $extrude = null;
    private ?bool $tessellate = null;
    private ?string $altitudeMode = null;
    private array $coordinates = [];

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitLineString($this);
    }

    public function addCoordinates(Coordinates $coordinate): void
    {
        $this->coordinates[] = $coordinate;
    }

    public function clearCoordinates(): void
    {
        $this->coordinates = [];
    }

    public function getExtrude(): bool
    {
        return $this->extrude;
    }

    public function setExtrude(bool $extrude): void
    {
        $this->extrude = $extrude;
    }

    public function getTessellate(): bool
    {
        return $this->tessellate;
    }

    public function setTessellate(bool $tessellate): void
    {
        $this->tessellate = $tessellate;
    }

    public function getAltitudeMode(): string
    {
        return $this->altitudeMode;
    }

    public function setAltitudeMode(string $altitudeMode): void
    {
        $this->altitudeMode = $altitudeMode;
    }

    public function getCoordinates(): array
    {
        return $this->coordinates;
    }

    public function setCoordinates(array $coordinates): void
    {
        $this->coordinates = $coordinates;
    }
}
