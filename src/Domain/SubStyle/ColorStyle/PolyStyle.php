<?php

declare(strict_types=1);

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * PolyStyle class.
 */
class PolyStyle extends ColorStyle
{
    private bool $fill = true;
    private bool $outline = true;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitPolyStyle($this);
    }

    public function getFill(): bool
    {
        return $this->fill;
    }

    public function setFill(bool $fill): void
    {
        $this->fill = $fill;
    }

    public function getOutline(): bool
    {
        return $this->outline;
    }

    public function setOutline(bool $outline): void
    {
        $this->outline = $outline;
    }
}
