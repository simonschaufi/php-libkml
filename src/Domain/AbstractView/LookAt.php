<?php

declare(strict_types=1);

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * Defines a virtual camera that is associated with a Feature.
 *
 * @see https://developers.google.com/kml/documentation/kmlreference#lookat
 */
class LookAt extends AbstractView
{
    use View;

    /**
     * Distance in meters from the point specified by <longitude>, <latitude>, and <altitude> to the LookAt position.
     */
    private float $range = 0.0;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitLookAt($this);
    }

    public function getRange(): float
    {
        return $this->range;
    }

    public function setRange(float $range): void
    {
        $this->range = $range;
    }
}
