<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType;

/**
 * ResouceMap class.
 */
class ResourceMap
{
    private array $aliases = [];

    public function getAliases(): array
    {
        return $this->aliases;
    }

    public function setAliases(array $aliases): void
    {
        $this->aliases = $aliases;
    }

    public function clearAliases(): void
    {
        $this->aliases = [];
    }

    public function addAlias($alias): void
    {
        $this->aliases[] = $alias;
    }
}
