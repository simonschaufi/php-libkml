<?php

declare(strict_types=1);

namespace LibKml\Domain\Feature\Container;

use LibKml\Domain\Feature\Feature;

abstract class Container extends Feature
{
    protected array $features = [];

    public function addFeature(Feature $feature): void
    {
        $this->features[] = $feature;
    }

    public function clearFeatures(): void
    {
        $this->features = [];
    }

    public function getFeatures(): array
    {
        return $this->features;
    }

    public function setFeatures(array $features): void
    {
        $this->features = $features;
    }
}
