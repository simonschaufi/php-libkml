<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType;

/**
 * Specifies how the altitude value is interpreted.
 */
class AltitudeMode
{
    public const CLAMP_TO_GROUND = 'clampToGround';
    public const RELATIVE_TO_GROUND = 'relativeToGround';
    public const ABSOLUTE = 'absolute';
}
