<?php

declare(strict_types=1);

namespace LibKml\Domain;

/**
 * A region describes an area of interest.
 */
class Region extends KmlObject
{
    private ?LatLonAltBox $latLonAltBox = null;
    private ?Lod $lod = null;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitRegion($this);
    }

    public function getLatLonAltBox(): LatLonAltBox
    {
        return $this->latLonAltBox;
    }

    public function setLatLonAltBox(LatLonAltBox $latLonAltBox): void
    {
        $this->latLonAltBox = $latLonAltBox;
    }

    public function getLod(): Lod
    {
        return $this->lod;
    }

    public function setLod(Lod $lod): void
    {
        $this->lod = $lod;
    }
}
