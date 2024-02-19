<?php

declare(strict_types=1);

namespace LibKml\Domain\Feature\Container;

use LibKml\Domain\KmlObjectVisitorInterface;

class Document extends Container
{
    private array $schemas = [];

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitDocument($this);
    }

    public function addSchema($schema): void
    {
        $this->schemas[] = $schema;
    }

    public function clearSchemas(): void
    {
        $this->schemas = [];
    }

    public function getSchemas(): array
    {
        return $this->schemas;
    }

    public function setSchemas(array $schemas): void
    {
        $this->schemas = $schemas;
    }
}
