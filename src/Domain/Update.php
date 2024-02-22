<?php

declare(strict_types=1);

namespace LibKml\Domain;

/**
 * Specifies a change to KML data already been loaded using the specified URL.
 */
class Update
{
    private ?string $targetHref = null;
    private array $change = [];
    private array $create = [];
    private array $delete = [];

    public function getTargetHref(): string
    {
        return $this->targetHref;
    }

    public function setTargetHref(string $targetHref): void
    {
        $this->targetHref = $targetHref;
    }

    public function getChange(): array
    {
        return $this->change;
    }

    public function setChange(array $change): void
    {
        $this->change = $change;
    }

    public function getCreate(): array
    {
        return $this->create;
    }

    public function setCreate(array $create): void
    {
        $this->create = $create;
    }

    public function getDelete(): array
    {
        return $this->delete;
    }

    public function setDelete(array $delete): void
    {
        $this->delete = $delete;
    }
}
