<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType;

/**
 * Specifies the current state of the NetworkLink or Folder.
 */
class ItemIconState
{
    public const OPEN = 'open';
    public const CLOSED = 'closed';
    public const ERROR = 'error';
    public const FETCHING0 = 'fetching0';
    public const FETCHING1 = 'fetching1';
    public const FETCHING2 = 'fetching2';
}
