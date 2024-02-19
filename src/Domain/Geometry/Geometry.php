<?php

declare(strict_types=1);

namespace LibKml\Domain\Geometry;

use LibKml\Domain\KmlObject;

/**
 * This is an abstract element and cannot be used directly in a KML file.
 * It provides a placeholder object for all derived Geometry objects.
 *
 * @see https://developers.google.com/kml/documentation/kmlreference#geometry
 */
abstract class Geometry extends KmlObject {}
