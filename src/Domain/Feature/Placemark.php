<?php

declare(strict_types=1);

namespace LibKml\Domain\Feature;

use LibKml\Domain\Geometry\Geometry;
use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * A Placemark is a Feature with associated Geometry.
 *
 * @see https://developers.google.com/kml/documentation/kmlreference#placemark
 */
class Placemark extends Feature
{
    private ?Geometry $geometry = null;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitPlacemark($this);
    }

    public function getGeometry(): ?Geometry
    {
        return $this->geometry;
    }

    public function setGeometry(?Geometry $geometry): void
    {
        $this->geometry = $geometry;
    }
}
