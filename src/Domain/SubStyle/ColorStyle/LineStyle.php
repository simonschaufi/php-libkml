<?php

declare(strict_types=1);

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\KmlObjectVisitorInterface;

class LineStyle extends ColorStyle
{
    private float $width = 1.0;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitLineStyle($this);
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function setWidth(float $width): void
    {
        $this->width = $width;
    }
}
