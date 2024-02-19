<?php

declare(strict_types=1);

namespace LibKml\Domain\TimePrimitive;

use LibKml\Domain\KmlObjectVisitorInterface;

class TimeStamp extends TimePrimitive
{
    private ?string $when = null;

    public static function fromInteger(int $unixTimestamp): TimeStamp
    {
        $timeStamp = new self();
        $timeStamp->when = date(DATE_ATOM, $unixTimestamp);
        return $timeStamp;
    }

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitTimeStamp($this);
    }

    public function getWhen(): ?string
    {
        return $this->when;
    }

    public function setWhen(?string $when): void
    {
        $this->when = $when;
    }
}
