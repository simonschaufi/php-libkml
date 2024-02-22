<?php

declare(strict_types=1);

namespace LibKml\Domain\Geometry;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * Polygon class.
 */
class Polygon extends Geometry
{
    private bool $extrude = false;
    private bool $tessellate = false;
    private string $altitudeMode = AltitudeMode::CLAMP_TO_GROUND;
    private ?LinearRing $outerBoundaryIs = null;
    private ?LinearRing $innerBoundaryIs = null;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitPolygon($this);
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

    public function getOuterBoundaryIs(): LinearRing
    {
        return $this->outerBoundaryIs;
    }

    public function setOuterBoundaryIs(LinearRing $outerBoundaryIs): void
    {
        $this->outerBoundaryIs = $outerBoundaryIs;
    }

    public function getInnerBoundaryIs(): LinearRing
    {
        return $this->innerBoundaryIs;
    }

    public function setInnerBoundaryIs(LinearRing $innerBoundaryIs): void
    {
        $this->innerBoundaryIs = $innerBoundaryIs;
    }
}
