<?php

declare(strict_types=1);

namespace LibKml\Domain\SubStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ListItemType;
use LibKml\Domain\KmlObjectVisitorInterface;

/**
 * Specifies how a Feature is displayed in the list view
 */
class ListStyle extends SubStyle
{
    private string $listItemType = ListItemType::CHECK;
    private ?Color $bgColor = null;
    private ?ItemIcon $itemIcon = null;

    public function accept(KmlObjectVisitorInterface $visitor): void
    {
        $visitor->visitListStyle($this);
    }

    public function getListItemType(): string
    {
        return $this->listItemType;
    }

    public function setListItemType(string $listItemType): void
    {
        $this->listItemType = $listItemType;
    }

    public function getBgColor(): ?Color
    {
        return $this->bgColor;
    }

    public function setBgColor(Color $bgColor): void
    {
        $this->bgColor = $bgColor;
    }

    public function getItemIcon(): ?ItemIcon
    {
        return $this->itemIcon;
    }

    public function setItemIcon(ItemIcon $itemIcon): void
    {
        $this->itemIcon = $itemIcon;
    }
}
