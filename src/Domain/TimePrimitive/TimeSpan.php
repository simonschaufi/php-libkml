<?php

declare(strict_types=1);

namespace LibKml\Domain\TimePrimitive;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * TimeSpan class.
 */
class TimeSpan extends TimePrimitive
{
    private ?string $begin = null;
    private ?string $end = null;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitTimeSpan($this);
    }

    public function getBegin(): ?string
    {
        return $this->begin;
    }

    public function setBegin(?string $begin): void
    {
        $this->begin = $begin;
    }

    public function getEnd(): ?string
    {
        return $this->end;
    }

    public function setEnd(?string $end): void
    {
        $this->end = $end;
    }
}
