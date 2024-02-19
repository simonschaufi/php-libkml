<?php

declare(strict_types=1);

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\KmlObject;
use LibKml\Domain\TimePrimitive\TimePrimitive;

abstract class AbstractView extends KmlObject
{
    protected TimePrimitive $timePrimitive;

    public function getTimePrimitive(): TimePrimitive
    {
        return $this->timePrimitive;
    }

    public function setTimePrimitive(TimePrimitive $timePrimitive): void
    {
        $this->timePrimitive = $timePrimitive;
    }
}
