<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType;

/**
 * Specifies a custom KML schema that is used to add custom data to KML Features.
 */
class Schema
{
    private ?string $id = null;
    private ?string $name = null;
    private array $fields = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function addField(?SimpleField $field): void
    {
        $this->fields[] = $field;
    }

    public function clearFields(): void
    {
        $this->fields = [];
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }
}
