<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType;

/**
 * Specifies how a Feature is displayed in the list view.
 */
class ListItemType
{
    public const CHECK = 'check';
    public const RADIO_FOLDER = 'radioFolder';
    public const CHECK_OFF_ONLY = 'checkOffOnly';
    public const CHECK_HIDE_CHILDREN = 'checkHideChildren';
}
