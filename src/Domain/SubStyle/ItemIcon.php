<?php

declare(strict_types=1);

namespace LibKml\Domain\SubStyle;

use LibKml\Domain\FieldType\ItemIconState;

class ItemIcon
{
    private string $state = ItemIconState::OPEN;
    private string $href;

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }

    public function getHref(): string
    {
        return $this->href;
    }

    public function setHref(string $href): void
    {
        $this->href = $href;
    }
}
