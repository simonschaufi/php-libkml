<?php

declare(strict_types=1);

namespace LibKml\Domain\Feature\ExtendedData;

/**
 * @see https://developers.google.com/kml/documentation/kmlreference#elements-specific-to-extendeddata
 */
class SchemaData
{
    private ?string $schemaUrl = null;
    private array $simpleData = [];

    public function getSchemaUrl(): ?string
    {
        return $this->schemaUrl;
    }

    public function setSchemaUrl(?string $schemaUrl): void
    {
        $this->schemaUrl = $schemaUrl;
    }

    public function getSimpleData(): array
    {
        return $this->simpleData;
    }

    public function setSimpleData(array $simpleData): void
    {
        $this->simpleData = $simpleData;
    }

    public function addSimpleData(SimpleData $simpleData): void
    {
        $this->simpleData[] = $simpleData;
    }
}
