<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType;

/**
 * Specifies a time-based refresh mode.
 */
class RefreshMode
{
    public const ON_CHANGE = 'onChange';
    public const ON_INTERVAL = 'onInterval';
    public const ON_EXPIRE = 'onExpire';
}
