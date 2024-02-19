<?php

declare(strict_types=1);

namespace LibKml\Domain\SubStyle\ColorStyle;

use LibKml\Domain\KmlObjectVisitorInterface;

class LabelStyle extends ColorStyle
{
    private float $scale = 1.0;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitLabelStyle($this);
    }

    public function getScale(): float
    {
        return $this->scale;
    }

    public function setScale(float $scale): void
    {
        $this->scale = $scale;
    }
}
