<?php

declare(strict_types=1);

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * Defines the virtual camera that views the scene
 *
 * @see https://developers.google.com/kml/documentation/kmlreference#camera
 */
class Camera extends AbstractView
{
    use View;

    /**
     * Rotation, in degrees, of the camera around the Z axis. Values range from −180 to +180 degrees.
     */
    private float $roll = 0.0;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitCamera($this);
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
