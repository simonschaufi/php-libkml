<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType;

/**
 * Alias class.
 */
class Alias
{
    private ?string $targetHref = null;
    private ?string $sourceHref = null;

    public function getTargetHref(): ?string
    {
        return $this->targetHref;
    }

    public function setTargetHref(string $targetHref): void
    {
        $this->targetHref = $targetHref;
    }

    public function getSourceHref(): ?string
    {
        return $this->sourceHref;
    }

    public function setSourceHref(string $sourceHref): void
    {
        $this->sourceHref = $sourceHref;
    }
}
