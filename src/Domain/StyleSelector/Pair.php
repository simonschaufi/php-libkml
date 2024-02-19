<?php

declare(strict_types=1);

namespace LibKml\Domain\StyleSelector;

/**
 * @see https://developers.google.com/kml/documentation/kmlreference#elements-specific-to-stylemap
 */
class Pair
{
    private ?string $key = null;
    private ?string $styleUrl = null;
    private ?Style $style = null;

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    public function getStyleUrl(): string
    {
        return $this->styleUrl;
    }

    public function setStyleUrl(string $styleUrl): void
    {
        $this->styleUrl = $styleUrl;
    }

    public function getStyle(): Style
    {
        return $this->style;
    }

    public function setStyle(Style $style): void
    {
        $this->style = $style;
    }
}
