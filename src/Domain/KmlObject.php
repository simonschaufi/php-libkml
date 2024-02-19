<?php

declare(strict_types=1);

namespace LibKml\Domain;

abstract class KmlObject
{
    protected ?string $id = null;
    protected ?string $targetId = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getTargetId(): ?string
    {
        return $this->targetId;
    }

    public function setTargetId(string $targetId): void
    {
        $this->targetId = $targetId;
    }

    abstract public function accept(KmlObjectVisitorInterface $visitor): void;
}
