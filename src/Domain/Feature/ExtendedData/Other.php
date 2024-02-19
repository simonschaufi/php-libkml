<?php

declare(strict_types=1);

namespace LibKml\Domain\Feature\ExtendedData;

/**
 * @see https://developers.google.com/kml/documentation/kmlreference#elements-specific-to-extendeddata
 */
class Other
{
    private ?string $namespace = null;
    private ?string $name = null;
    private ?string $value = null;

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function setNamespace(string $namespace): void
    {
        $this->namespace = $namespace;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
