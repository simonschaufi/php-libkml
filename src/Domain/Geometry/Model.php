<?php

declare(strict_types=1);

namespace LibKml\Domain\Geometry;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\FieldType\Orientation;
use LibKml\Domain\FieldType\ResourceMap;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\Link;
use LibKml\Domain\Scale;

/**
 * A 3D object described in a COLLADA file
 */
class Model extends Geometry
{
    private string $altitudeMode = AltitudeMode::CLAMP_TO_GROUND;
    private ?Coordinates $location = null;
    private ?Orientation $orientation = null;
    private ?Scale $scale = null;
    private ?Link $link = null;
    private ?ResourceMap $resourceMap = null;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitModel($this);
    }

    public function getAltitudeMode(): string
    {
        return $this->altitudeMode;
    }

    public function setAltitudeMode(string $altitudeMode): void
    {
        $this->altitudeMode = $altitudeMode;
    }

    public function getLocation(): ?Coordinates
    {
        return $this->location;
    }

    public function setLocation(?Coordinates $location): void
    {
        $this->location = $location;
    }

    public function getOrientation(): ?Orientation
    {
        return $this->orientation;
    }

    public function setOrientation(?Orientation $orientation): void
    {
        $this->orientation = $orientation;
    }

    public function getScale(): ?Scale
    {
        return $this->scale;
    }

    public function setScale(?Scale $scale): void
    {
        $this->scale = $scale;
    }

    public function getLink(): ?Link
    {
        return $this->link;
    }

    public function setLink(?Link $link): void
    {
        $this->link = $link;
    }

    public function getResourceMap(): ?ResourceMap
    {
        return $this->resourceMap;
    }

    public function setResourceMap(?ResourceMap $resourceMap): void
    {
        $this->resourceMap = $resourceMap;
    }
}
