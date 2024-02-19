<?php

declare(strict_types=1);

namespace LibKml\Domain\Geometry;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * @see https://developers.google.com/kml/documentation/kmlreference#point
 */
class Point extends Geometry
{
    /**
     * Specifies whether to connect the point to the ground with a line.
     * To extrude a Point, the value for <altitudeMode> must be either relativeToGround, relativeToSeaFloor, or absolute.
     * The point is extruded toward the center of the Earth's sphere.
     */
    private bool $extrude = false;

    /**
     * Specifies how altitude components in the <coordinates> element are interpreted.
     */
    private ?string $altitudeMode = null;

    /**
     * A single tuple consisting of floating point values for longitude, latitude, and altitude (in that order)
     */
    private Coordinates $coordinates;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitPoint($this);
    }

    public function getExtrude(): bool
    {
        return $this->extrude;
    }

    public function setExtrude(bool $extrude): void
    {
        $this->extrude = $extrude;
    }

    public function getAltitudeMode(): string
    {
        return $this->altitudeMode;
    }

    public function setAltitudeMode(string $altitudeMode): void
    {
        $this->altitudeMode = $altitudeMode;
    }

    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

    public function setCoordinates(Coordinates $coordinates): void
    {
        $this->coordinates = $coordinates;
    }
}
