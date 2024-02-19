<?php

declare(strict_types=1);

namespace LibKml\Domain\StyleSelector;

use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * @see https://developers.google.com/kml/documentation/kmlreference#stylemap
 */
class StyleMap extends StyleSelector
{
    private array $pairs = [];

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitStyleMap($this);
    }

    public function clearPairs(): void
    {
        $this->pairs = [];
    }

    public function getPairs(): array
    {
        return $this->pairs;
    }

    public function setPairs(array $pairs): void
    {
        $this->pairs = $pairs;
    }

    public function addPair(Pair $pair): void
    {
        $this->pairs[] = $pair;
    }
}
