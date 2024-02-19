<?php

declare(strict_types=1);

namespace LibKml\Domain;

/**
 * Level of Detail
 *
 * @see https://developers.google.com/kml/documentation/kmlreference#lod
 */
class Lod
{
    private int $minLodPixels = 0;
    private ?int $maxLodPixels = null;
    private ?int $minFadeExtent = null;
    private ?int $maxFadeExtent = null;

    public function getMinLodPixels(): int
    {
        return $this->minLodPixels;
    }

    public function setMinLodPixels(int $minLodPixels): void
    {
        $this->minLodPixels = $minLodPixels;
    }

    public function getMaxLodPixels(): ?int
    {
        return $this->maxLodPixels;
    }

    public function setMaxLodPixels(?int $maxLodPixels): void
    {
        $this->maxLodPixels = $maxLodPixels;
    }

    public function getMinFadeExtent(): ?int
    {
        return $this->minFadeExtent;
    }

    public function setMinFadeExtent(?int $minFadeExtent): void
    {
        $this->minFadeExtent = $minFadeExtent;
    }

    public function getMaxFadeExtent(): ?int
    {
        return $this->maxFadeExtent;
    }

    public function setMaxFadeExtent(?int $maxFadeExtent): void
    {
        $this->maxFadeExtent = $maxFadeExtent;
    }
}
