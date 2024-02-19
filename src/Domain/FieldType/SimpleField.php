<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType;

/**
 * The declaration of a custom field.
 */
class SimpleField
{
    private ?string $type = null;
    private ?string $name = null;
    private ?string $displayName = null;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    public function setDisplayName(string $displayName): void
    {
        $this->displayName = $displayName;
    }
}
