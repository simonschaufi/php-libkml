<?php

declare(strict_types=1);

namespace LibKml\Domain\Feature\Container;

use LibKml\Domain\KmlObjectVisitorInterface;

class Folder extends Container
{
    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitFolder($this);
    }
}
