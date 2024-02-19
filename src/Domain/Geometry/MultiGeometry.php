<?php

declare(strict_types=1);

namespace LibKml\Domain\Geometry;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * @see https://developers.google.com/kml/documentation/kmlreference#multigeometry
 */
class MultiGeometry extends Geometry
{
    private array $geometries = [];

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitMultiGeometry($this);
    }

    public function addGeometry(Geometry $geometry): void
    {
        $this->geometries[] = $geometry;
    }

    public function clearGeometries(): void
    {
        $this->geometries = [];
    }

    public function getGeometries(): array
    {
        return $this->geometries;
    }

    public function setGeometries(array $geometries): void
    {
        $this->geometries = $geometries;
    }
}
