<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType;

/**
 * Specifies how the link is refreshed when the "camera" changes.
 */
class ViewRefreshMode
{
    public const NEVER = 'never';
    public const ON_STOP = 'onStop';
    public const ON_REQUEST = 'onRequest';
    public const ON_REGION = 'onRegion';
}
