<?php

declare(strict_types=1);

namespace LibKml\Domain\Feature\ExtendedData;

/**
 * @see https://developers.google.com/kml/documentation/kmlreference#elements-specific-to-extendeddata
 */
class Data
{
    private ?string $name = null;
    private ?string $value = null;
    private ?string $displayName = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): void
    {
        $this->value = $value;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function setDisplayName(?string $displayName): void
    {
        $this->displayName = $displayName;
    }
}
